<template>
    <ul class="mx-auto w-1/3 flex flex-col items-center mt-4 bg-blue-500">
        <li>
            <h1 class="text-3xl">
            <router-link to="/books">Lista libros </router-link>  <!--directiva router-link adds router.js-->
            </h1>    
        </li>
        <li>
            <h1 class="text-3xl">
            <router-link to="/login">login </router-link>
            </h1>
        </li>
        <li>
            <h1 class="text-3xl">
            <router-link to="/registro">Registro </router-link>
            </h1>
        </li>
    </ul>
    
    <router-view></router-view>   <!--etqta siempre necesaria que se trabaje con VUE ROUTER-->
</template>
<script>
export default {};
</script>