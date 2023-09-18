import './bootstrap';

import 'admin-lte/plugins/jquery/jquery.min.js';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';

import {createApp} from 'vue';

import router from './router';

import App from './pages/admin/Layout.vue';

createApp(App)
.use(router)
.mount('#Main_App');
