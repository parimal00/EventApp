
import { createRouter, createWebHistory } from 'vue-router';
import Create from '../Components/Create.vue';
const routes = [
    {
        path: '/create',
        name: 'create',
        component: Create
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// const router = createRouter({
//     // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
//     history: createWebHashHistory(),
//     routes, // short for `routes: routes`
// })

export default router;