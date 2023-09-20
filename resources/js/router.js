import { createWebHistory , createRouter } from "vue-router";

import Dashboard from './pages/admin/dashboard.vue';
import Service from './pages/admin/service.vue';
import Students from './pages/admin/students.vue';
import TrashStudents from './pages/admin/trashStudent.vue';

const routes = [
    {
        path: '/admin/dashboard',
        name:'admin_dashboard',
        component: Dashboard
    },
    {
        path: '/admin/service',
        name:'admin_service',
        component: Service
    },
    {
        path: '/admin/students',
        name:'admin_students',
        component: Students
    },
    {
        path: '/admin/students/trash',
        name:'admin_students_trash',
        component: TrashStudents
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;



