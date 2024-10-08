import {createApp} from 'vue'

import app from './components/aiModal.vue'

import router from './router'

createApp(app).use(router).mount('#ai-request');