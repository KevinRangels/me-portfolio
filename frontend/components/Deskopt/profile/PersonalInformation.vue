<template>
  <div class="panelmain_information">
      <div class="info1_container">
        <div class="info1_container_description">
          <label class="info1_label">Nombre</label>
          <h3 class="info1_text">Kevin Rangel</h3>
        </div>
        <div class="info1_container_description">
          <label class="info1_label">Estudios</label>
          <h3 class="info1_text">Desarrollador Web / Ing Sistemas</h3>
        </div>
        <div class="info1_container_description">
          <label class="info1_label">Edad</label>
          <h3 class="info1_text">27 años</h3>
        </div>
        <div class="info1_container_description">
          <label class="info1_label">Nacionalidad</label>
          <h3 class="info1_text">Venezolano</h3>
        </div>
        <!-- <div class="info1_container_description">
          <label class="info1_label">Número de telefono</label>
          <h3 class="info1_text">+54 4248644310</h3>
        </div> -->
        <div class="info1_container_description">
          <label class="info1_label">Correo electronico</label>
          <h3 class="info1_text">krangel107@gmail.com</h3>
        </div>
        <div class="info1_container_description">
          <label class="info1_label">CV</label>
          <button class="mb-3 px-5">Descargar</button>
        </div>
        <div class="info1_container_description">
          <label class="info1_label">Sobre mí</label>
          <h3 class="info1_text">Soy desarrollador web con 1 año de experiencia desarrollando aplicaciones web escalables con tecnología de punta. Tengo hábiles conocimientos en el manejo de distintas herramientas en el ámbito del desarrollo Frontend y conocimientos básicos en el desarrollo por parte del servidor con php y Mysql .Me exijo constantemente en el aprendizaje de nuevas tecnologías por el gusto a programar</h3>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'PersonalInformation'
}
</script>

<style scoped>
.panelmain_information{
    border: 3px solid gold;
    width: 70%;
    height: 100%;
    display: flex;
    flex-direction: column;
    text-align: left;
    background: black;
    border-radius: 30px;
  }
  .panel_information_proyects{
    padding: 20px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    overflow-y: auto;
  }
  .info1_container_description{
    margin-bottom: 20px;
    width: 50%;
    display: flex;
    flex-direction: column;
  }
  .info1_container_description button {
    width: 40%;
    background: gold;
    color: #000000;
    outline: none;
    border: none;
    font-size: 15px;
    border-radius: 8px;
    padding: 4px 0;
  }
  .info1_container{
    padding: 5%;
    overflow: auto;
    display: flex;
    flex-wrap: wrap;
  }
  .info1_label{
    color: gold;
    font-weight: 600;
    font-size: 1.5rem;
    margin-bottom: 0;
  }
  .info1_text{
    color: white;
    font-size: 1.3rem;
    font-weight: 300;
  }
@media (min-width:320px) and (max-width:520px){
    .panelmain_perfil_img{
      display: none;
    }
    .panelmain_information{
      display: none;
    }
    .panelmain_container_perfil_img{
      display: none;
    }
    .pannelmain_info_title{
      display: none;
    }
    .panelmain_info_text{
      display: none;
    }
    .panelmain_container_info{
      height: 93%;
      overflow-y: auto;
      padding-top: 0;
    }
    .panelmain_container_btns{
      height: 50px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  }
</style>