import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  
  {
    path: '/browse',
    name: 'Browse',
    component: () => import('../views/Browse.vue')
  },
  
  {
    path: '/post-job',
    name: 'PostJob',
    component: () => import('../views/PostJob.vue')
  },
  
  {
    path: '/job/:id',
    name: 'Job',
    component: () => import('../views/Job.vue')
  }
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
