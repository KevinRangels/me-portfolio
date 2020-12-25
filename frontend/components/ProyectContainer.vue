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
        <b-tab title="Info" active class="px-3">
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
        <b-tab title="Tecnologias" class="px-3">
          <div class="proyectInfo_techsContainer mt-3">
            <div class="proyectInfo_techs mb-3" v-for="number in [0, 1, 2, 3, 4]"
            v-bind:key="number">
              <div class="proyectInfo_techContainerImg p-1  px-md-3">
                <img src="../assets/img/html5.svg" class="img-fluid" alt="">
              </div>
              <div class="proyectInfo_techContainerName">
                <h4>Html</h4>
              </div>
            </div>
          </div>
        </b-tab>
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
.proyectInfo_techsContainer {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.proyectInfo_techs {
  width: 47%;
  display: flex;
  align-items: center;
  height: 35px;
  background: #000;
  border: 1px solid gold;
  border-radius: 14px;
}
.proyectInfo_techContainerImg {
  width: 30%;
  display: flex;
  height: 100%;
  justify-content: center;
  /* align-items: center; */
}
.proyectInfo_techContainerName {
  width: 70%;
  color: #ffffff
}
.proyectInfo_techContainerName h4 {
  margin-bottom: 0;
  font-size: 1.2rem;
}
@media (min-width:320px) and (max-width:520px){
 .ProyectContainer{
   width: 100%;
 } 
}
</style>
