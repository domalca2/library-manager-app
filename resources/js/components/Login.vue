<template>
    <div class="flex justify-center items-center mt-11">
        <form @submit.prevent="login" class="bg-white shadow-md rounded p-8">

            <div>
                <label for="">Email: </label>
                <input v-model="email" type="email" id="email" placeholder="Email de usuario" />
            </div>

            <div>
                <label for="">Password: </label>
                <input v-model="password" type="password" id="password" placeholder="Contrasena de usuario" />
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold">
                Login
            </button>
        </form>
        
    </div>
</template>

<script>
    import axios from 'axios';

export default{
    data() {
        return{
            email:'',
            password:'',
        };
    },
    methods:{
        login(){
            axios
                .post('api/login',{
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    alert(response.data.token);
                    alert("Inicio ok");
                    localStorage.setItem('token', response.data.token)
                    this.$router.push({name: 'Profile'}); //si el login es correcto lleva a la pantalla de profile con los datos del usuario
                })
                .catch((error) => {
                    alert('Error al inicio de sesion');
                    console.error('Error al inicio de sesion', error);
                });
        },
    },
};
    
</script>