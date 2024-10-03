import {createApp} from 'vue'

import app from './components/ebookModal.vue'

import router from './router'

createApp(app).use(router).mount('#ebook-init');