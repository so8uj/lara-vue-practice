<template> 

    <Nav />
    <Sidebar />
    
    <router-view></router-view>

</template>
<script setup lang="ts"> 

import Nav from '../../components/nav.vue';
import Sidebar from '../../components/sidebar.vue';
// import Content from '../../components/content.vue';

</script>
