<template>
  <div class="InformationPersonal pt-5 px-3">
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
        <h3 class="info1_text">26 años</h3>
      </div>
      <div class="info1_container_description">
        <label class="info1_label">Ubicacion</label>
        <h3 class="info1_text">Venezuela</h3>
      </div>
      <div class="info1_container_description">
        <label class="info1_label">Número de telefono</label>
        <h3 class="info1_text">+54 4248644310</h3>
      </div>
      <div class="info1_container_description">
        <label class="info1_label">Correo electronico</label>
        <h3 class="info1_text">krangel107@gmail.com</h3>
      </div>
      <div class="info1_container_description">
        <label class="info1_label">Sobre mí</label>
        <h3 class="info1_text">
          Soy desarrollador web con 1 año de experiencia desarrollando
          aplicaciones web escalables con tecnología de punta. Tengo hábiles
          conocimientos en el manejo de distintas herramientas en el ámbito del
          desarrollo Frontend y conocimientos básicos en el desarrollo por parte
          del servidor con php y Mysql .Me exijo constantemente en el
          aprendizaje de nuevas tecnologías por el gusto a programar
        </h3>
      </div>
    </div>
  </div>
</template>

<script>
import navMovil from "@/components/movil/navMovil.vue";

export default {
  name: "InformationPersonal",
  components: {
    navMovil
  },
  props: {
    msg: String
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.InformationPersonal {
  height: 100%;
}
.info1_label{
  color: gold;
  font-size: 20px;
  margin-bottom: 0;
}
.info1_text{
  color: #ffffff;
  font-size: 20px;
}
</style>
