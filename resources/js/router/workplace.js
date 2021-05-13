
export default [
    {
        path: '/workplace/',
        name: 'Workplace',
        component: () => import('../views/workplace/Workplace'),
        meta: { requiresAuth: true, type: 3 },
        children: [
            {
                path: 'inventory',
                name: 'Inventory',
                component: () => import('../views/workplace/Inventory'),
                meta: { requiresAuth: true, type: 3 }
            },
        ]
    },
]
