import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Biodata from '@/components/Biodata'
import BiodataForm from '@/components/BiodataForm'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/biodata',
      name: 'Biodata',
      component: Biodata
    },
    {
      path: '/biodata/create',
      name: 'BiodataCreate',
      component: BiodataForm
    },
    {
      path: '/biodata/:id',
      name: 'BiodataEdit',
      component: BiodataForm
    }
  ]
})
