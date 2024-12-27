<template>
    <div>
        <h2 class="bg-red-800 text-white w-1/3 mt-12 ms-11">lista de libros</h2>
        <ul>
            <li v-for="book in books" :key="book.id" class="mt-12 ms-11">
                {{ book.title }}
                <button @click="addFavorito(book.id)" class="px-3 py-1 ml-2 bg-blue-500 hover:bg-blue-700 text-white rounded">
                    Add Fav
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
import Cookies from 'js-cookie'; // instalada al principio y albergada en node_modules
    export default{
        data(){
           return{
            books:[],  // como el array esta varcio, llamamos a la api para 
           }           //cargar los datos en el array cuando se monte el componente
        },
        mounted(){
            fetch('/api/libros') //especifica la ruta para traer los libros
                .then((response) => response.json())
                .then((data) => {
                    this.books = data;
                })
        },
        methods:{
            addFavorito(id){   // puede que ya haya libros en favoritos:
                
                let favorites = Cookies.get('favorites');  //consigue los favoritos existentes
                
                if(!favorites){
                    favorites = '[]';
                }

                //parseand lista como json
                favorites = JSON.parse(favorites);

                //agregan nuevo favorito
                if(!favorites.includes(id)){
                    favorites.push(id);
                    //actualizarlo en variable Cookies
                    Cookies.set('favorites', JSON.stringify(favorites), {expires : 30});
                }

                //actualizando favorites
                this.favorites = favorites;
                console.log(favorites);
            }
        }
    }
</script>