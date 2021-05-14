import { createRouter, createWebHashHistory } from 'vue-router'
import workplace from "./workplace";
import user from "./user"

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../views/Home.vue'),
        meta: { requiresAuth: true }
    },
    ...workplace,
    ...user,
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

export default router
