export default [
    {
        path: '/publications',
        name: 'Publications',
        component: () => import('../views/Publications/Publications'),
        meta: { requiresAuth: true, type: 2 },
    },
]
