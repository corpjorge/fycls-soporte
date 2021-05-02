import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
    {
        path: '/',
        name: 'root',
        redirect: '/home',
        meta: { requiresAuth: true }
    },
    {
        path: '/home',
        name: 'Home',
        component: () => import('../views/Home.vue')
    }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
