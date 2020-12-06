<template>
	<div>
		<h1>Lenguajes</h1>
		<form @submit="newLanguage">
			<input type="text" v-model="nameLanguage" placeholder="Nombre de lenguaje">
			<!-- <input type="file" placeholder="Imagen de lenguaje"> -->
			{{nameLanguage}}

			<button type="submit" class="btn btn-success tasa_config_btn">Guardar cambios</button>
		</form>
	</div>
</template>
<script>
	export default {
        data(){
            return {
            	nameLanguage: null
            }
        },
         methods:{
         	newLanguage(e){
         	  e.preventDefault();
         	   axios.post('http://127.0.0.1:8000/api/languages', { name: this.nameLanguage})
                  .then(res =>{ console.log(res) } )
                  .catch(err =>{   
                               console.log(err)            
                   });
              },
         	  	
         	}
         }
    
</script>