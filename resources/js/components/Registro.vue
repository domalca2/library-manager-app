<template>
    <div class="flex justify-center items-center mt-11">
        <form @submit.prevent="register">
        
            <div class="mb-4">
                <label for="">Name: </label>
                <input v-model="name" type="text" id="name" placeholder="Nombre de usuario" />
            </div>

            <div class="mb-4">
                <label for="">Email: </label>
                <input v-model="email" type="email" id="email" placeholder="Email de usuario" />
            </div>

            <div class="mb-4">
                <label for="">Password: </label>
                <input v-model="password" type="password" id="password" placeholder="Contrasena de usuario" />
            </div>

            <button type="submit" class="bg-blue-500 text-white">
                Register
            </button>
        </form>
        
    </div>
</template>

<script>
import axios from 'axios';
export default{
    data() {
        return{
            name:'',
            email:'',
            password:'',
        };
    },
    mounted() {
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
    },
    methods:{
        register(){
            axios
                .post('register',{  //envio al endpoin web/register
                    name: this.name,
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    console.log(response)
                    localStorage.setItem('token', response.data.token);
                    const nombre = JSON.parse(response.config.data).name;

                    this.$router.push({ name: 'Profile' }); // cuando ya se haya hecho todo lo anterior, vue redirecciona hacia el componente Profile 
                })
                .catch((error) => {
                    console.error('Error de registro', error);
                });
        },
    },
    
};
    
</script>