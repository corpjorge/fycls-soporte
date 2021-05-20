import { createRouter, createWebHashHistory } from 'vue-router'
import workplace from "./workplace";
import user from "./user"
import Device from "./device"

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../views/Home.vue'),
        meta: { requiresAuth: true }
    },
    ...workplace,
    ...user,
    ...Device,
]

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes,
    scrollBehavior() {
        return { top: 0 }
    },
})

export default router
