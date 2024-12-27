import { createRouter, createWebHistory } from 'vue-router';
import BookList from'@/components/BookList.vue';
//importación de los 3 nuevos componentes:
import Login from '@/components/Login.vue';
import Profile from '@/components/Profile.vue';
import Registro from '@/components/Registro.vue';


const routes = [
    {
        path : '/books',
        component : BookList,
    },
    {
        path: '/registro',
        name: 'Registro',                //nombre = nombre de la vista
        component: Registro,
    },
    {
        path: '/profile',
        name: 'Profile',                 //nombre = nombre de la vista
        component: Profile,
        meta: { requiresAuth: true } //**usuario tiene que estar autenticado para cargar la pagina */
    },
    {
        path: '/login',
        name: 'Login',                     //nombre = nombre de la vista
        component: Login,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router