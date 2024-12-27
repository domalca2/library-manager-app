import 'tailwindcss/tailwind.css';
import { createApp } from 'vue';
import HelloWorld from'@/components/HelloWorld.vue';
import BookList from'@/components/BookList.vue';

import router from"./router";

//creando la app
createApp(HelloWorld).use(router).mount("#app");