import { createWebHistory , createRouter } from "vue-router";

import Dashboard from './pages/admin/dashboard.vue';
import Service from './pages/admin/service.vue';

const routes = [
    {
        path: '/dashboard',
        name:'admin.dashboard',
        component: Dashboard
    },
    {
        path: '/service',
        name:'admin.service',
        component: Service
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;



