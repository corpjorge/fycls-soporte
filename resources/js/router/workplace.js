
export default [
    {
        path: '/workplace/',
        name: 'Workplace',
        component: () => import('../views/workplace/Workplace'),
        meta: { requiresAuth: true, type: 2 },
    },
    {
        path: '/workplace/:id',
        name: 'Entity',
        component: () => import('../views/workplace/Entity'),
        meta: { requiresAuth: true, type: 2 },
    },
]
