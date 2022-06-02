import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './style/index.css'
import {store} from "./store" ;
import Vue2Editor from "vue2-editor";



const app = createApp(App)
app.use(router)
app.use(store)
app.use(Vue2Editor);
app.mount('#app')


