<template>
  <div class="ProyectContainer py-3" id="ProyectContainer">
    <div class="proyect_main_container">
      <div class="proyect_container_title text-center">
        <h4 class="proyect_title">Futura Encuesta</h4>
      </div>
      <div class="proyect_container_img">
        <img src="../assets/img/Futura.png" alt="" class="img-fluid" />
      </div>

      <b-tabs content-class="mt-0" fill>
        <b-tab title="Info" active>
          <p class="proyectInfo_description_title">
            Descripción
          </p>
          <p class="proyectInfo_description_text">
            Futura Encuesta es una pagina web la cual su objetivo es recaudar informacion de estudiantes sobre distintos apectos de la Universidad donde estudia y el programa que cursa
          </p>
          <p class="proyectInfo_description_title">
            Contribución
          </p>
          <p class="proyectInfo_description_text">
            Forme parte de un equipo de desarollo donde trabaje tanto el frontend como el backend de la pagina
          </p>
        </b-tab>
        <b-tab title="Tecnologias"><p>I'm the second tab</p></b-tab>
        <b-tab title="Entrar"></b-tab>
      </b-tabs>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProyectContainer"
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.ProyectContainer {
  width: 47%;
}
.proyect_main_container {
  width: 100%;
  border: 3px solid gold;
  border-radius: 10px;
  overflow: hidden;
}
.proyect_title {
  color: gold;
}
.tab-content > .active {
  display: block;
  background: rgb(172, 166, 166);
  padding: 5px;
}
.proyectInfo_description_title {
  color: gold;
  font-weight: 700;
  margin-bottom: 0;
}
.proyectInfo_description_text {
  color: white;
  font-size: 14px;
  margin-bottom: 0;
}
@media (min-width:320px) and (max-width:520px){
 .ProyectContainer{
   width: 100%;
 } 
}
</style>
