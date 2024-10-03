import {createRouter, createWebHistory} from "vue-router";
import aiRequest from '../components/dynamics/ai_request.vue';
import ebookInit from '../components/dynamics/ebook_init.vue';
const routes = [
    {
        path:'/:pathMatch(.*)',
        name:'dynamics.ai_request',
        component: aiRequest
    },
    {
        path:'/ebook/:pathMatch(.*)',
        name:'dynamics.ebook_init',
        component: ebookInit,
        props: true
    }
    
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router