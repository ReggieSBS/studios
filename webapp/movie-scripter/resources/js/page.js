import {createApp} from 'vue'

import app from './components/pageModal.vue'

import router from './router'

createApp(app).use(router).mount('#page-init');