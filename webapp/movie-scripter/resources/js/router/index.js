import {createRouter, createWebHistory} from "vue-router";
import aiRequest from '../components/dynamics/ai_request.vue';
import aiResponse from '../components/dynamics/ai_response.vue';
const routes = [
    {
        path:'/dashboard',
        name:'dynamics.ai_request',
        component: aiRequest
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router