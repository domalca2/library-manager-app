<template>
    <div class="flex flex-col items-center mt-11">
        <h1 class="text-3xl">Perfil de Usuario</h1>
        
        <div v-if="user">               <!-- si existe el usuario muestra nombre e email-->
            <p><b>Nombre:</b> {{ user.name }}</p>
            <p><b>Correo elec:</b> {{ user.email }}</p>
        </div>

        <button class="bg-blue-500 text-white font-bold" @click="logout"> <!--funcion de salir-->
                Salir
            </button>
            
    </div>
</template>

<script>
export default{
    data() {
        return{
            user:null, //
        };
    },
    mounted(){ // cuando se monta el componente se necesitan los datos del usuario 
        fetch('api/user', { // lanza la peticion a URI api/user
            method:'GET',
            headers:{ // al estar autentificados en el sistema poner lo siguiente: 
                'Authorization': 'Bearer ' + localStorage.getItem('token'), //autoriz tipo bearer con el token guardado cuando se registra o al inicio de sesion
            },
        })
        .then((response) => response.json())
        .then((data) => {
            this.user = data; //guarda datos en user
        })
        .catch((error) => {
            console.error('Error al cargar los datos', error);
        });
    },
    methods:{
        logout(){
            fetch('api/logout', {
                method:'POST',
                headers:{
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                },
            })
          .then((respuesta)=> respuesta.json()) 
          .then((data)=>{
            console.log(data.message)
          })
          
          .then(()=>{
  //            console.log(response);
                localStorage.removeItem('token');
                this.$router.push({ name:'Login' }); // lleva a la pagina de login
           })
            .catch((error) => {
                console.error('Error al cerrar la sesion', error);
            });
        },
    },
};
</script>