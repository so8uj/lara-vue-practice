<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Students</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Students</a></li>
                        </ol>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="button" @click="data.showModal=true" class="btn btn-primary mb-3">
                            Add Student
                        </button>
                        <div class="mt-3 alert alert-success" v-if="success.student_added">{{ success.student_added[0] }}</div>
                        <div class="card">

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Roll</th>
                                            <th>Department</th>
                                            <th>Batch</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user, index) in users" :key="user.id">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.roll }}</td>
                                            <td>{{ user.department }}</td>
                                            <td>{{ user.batch }}</td>
                                            <td>
                                                <button @click="updateModalShow(user)" class="btn btn-xs btn-primary mr-1"><i class="fa fa-edit"></i></button>
                                                <button @click="deleteStudent(user.id)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- add student modal -->


                <div v-if="data.showModal" class="modal fade" :class="{'show':data.showModal}" style="display: block; padding-left: 17px;"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-if="data.editingModal">Eidt Student Details</h5>
                                <h5 class="modal-title" v-else>Add Student Details</h5>
                                <button type="button" class="close" @click="closeModal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" v-model="formData.name" class="form-control" :class="{'is-invalid':errors.name}" id="name" placeholder="type name">
                                        <strong class="text-danger" v-if="errors.name">{{ errors.name[0] }}</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="roll">Roll</label>
                                                <input type="text" v-model="formData.roll" class="form-control" :class="{'is-invalid':errors.roll}" id="roll" placeholder="type roll">
                                                <strong class="text-danger" v-if="errors.roll">{{ errors.roll[0] }}</strong>
                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input type="text" v-model="formData.department" class="form-control" :class="{'is-invalid':errors.department}" id="department" placeholder="type department">
                                                <strong class="text-danger" v-if="errors.department">{{ errors.department[0] }}</strong>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="batch">Batch</label>
                                                <input type="text" v-model="formData.batch" class="form-control" :class="{'is-invalid':errors.batch}" id="batch" placeholder="type batch">
                                                <strong class="text-danger" v-if="errors.batch">{{ errors.batch[0] }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" v-if="data.editingModal" @click="updateFromData" type="button"> <i class="fa fa-user-plus"></i> Update Student</button>
                                        <button class="btn btn-primary" v-else @click="addFromData" type="button"> <i class="fa fa-user-plus"></i> Add Student</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</template>


<script setup lang="ts">

import { onMounted, ref, reactive } from 'vue';
import axios from 'axios';

let data = reactive({
    showModal: false,
    editingModal: false,
    updateUserID: ''
    
});

let formData = reactive({
    id:'',
    name:'',
    roll:'',
    department:'',
    batch:'',
});

const users = ref([]);
const errors = ref([]);
const success = ref([]);
const updateDatas = ref([]);

const getUsers = () => {
    axios.get('/api/students')
        .then((response) => {
            users.value = response.data;
        });
}

const addFromData = async () => {
    const response = await axios.post('/api/student/add',formData)
    .then((response) => {
        users.value = response.data.students;
        data.showModal = false;
        data.editingModal = false;
        formData.name = '';
        formData.roll = '';
        formData.department = '';
        formData.batch = '';
        success.value = response.data.message;
    })
    .catch((err)=>{
        errors.value = err.response.data.message;
    });
}

const updateFromData = async () => {
    await axios.post('/api/student/update',formData)
        .then((response)=>{
            users.value = response.data.students;
            data.showModal = false;
            data.editingModal = false;
            formData.id = '';
            formData.name = '';
            formData.roll = '';
            formData.department = '';
            formData.batch = '';
            success.value = response.data.message;
        })
        .catch((err)=>{
            errors.value = err.response.data.message;
        });
}

const deleteStudent = (userId) => {
    if(confirm('are you sure')){
        // axios.post('/api/student/delete',userId)
        // .then((res)=>{
        //     alert(res);
        // });
    }
}

const closeModal = () => {
    data.showModal = false;
    data.editingModal = false;
    formData.id = '';
    formData.name = '';
    formData.roll = '';
    formData.department = '';
    formData.batch = '';
}
const updateModalShow = (updateUser) => {
    data.showModal = true;
    data.editingModal = true;
    formData.id = updateUser.id;
    formData.name = updateUser.name;
    formData.roll = updateUser.roll;
    formData.department = updateUser.department;
    formData.batch = updateUser.batch;
}

onMounted(() => {
    getUsers();
});


</script>