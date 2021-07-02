import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAgile from 'vue-agile'

Vue.use(VueRouter)
Vue.use(VueAgile)

import App from './components/App'
import Home from './components/Home'
import Detail from './components/Detail'

const router = new VueRouter({
    mode: 'history',
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/:slug',
        name: 'detail',
        component: Detail
    }
]
})

new Vue({
    el: '#app',
    components: { App },
    router
})
