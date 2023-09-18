import { createWebHistory , createRouter } from "vue-router";

import Dashboard from './pages/admin/dashboard.vue';
import Service from './pages/admin/service.vue';

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
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;



