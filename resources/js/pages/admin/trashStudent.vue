<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Students ( Recycle Bin )</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name:'admin_students'}">Students</router-link></li>
                            <li class="breadcrumb-item">Trash</li>
                        </ol>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <router-link :to="{name:'admin_students'}" class="btn btn-primary mb-3">
                            <i class="fa fa-users"></i> All Students
                        </router-link>
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
                                                <button title="Restore" class="btn btn-xs btn-primary mr-1"><i class="fa fa-undo"></i></button>
                                                <button title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>


<script setup lang="ts">

import {onMounted,ref} from 'vue';

import axios from 'axios';


    const users = ref([]);


    const trashUsers = () => {
        axios.get('/api/students/trash-students')
        .then((response) => {
            users.value = response.data;
        });
    };

    onMounted (() => {
        trashUsers();
    }) ;

</script>