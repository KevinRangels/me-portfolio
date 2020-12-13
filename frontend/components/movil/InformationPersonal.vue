<template>
  <div class="InformationPersonal pt-5 px-3">
    <div class="info1_container">
      <div class="info1_containerTop my-3">
        <div class="info1_photoProfile">
          <img src="../../assets/img/ironman_Avatar.jpg" alt="" class="img-fluid">
        </div>
        <div class="info1_containerContact px-2">
          <h3 class="info1_name mb-2">Kevin Rangel</h3>
          <button class=" mb-3">Contactame</button>
          <div class="info1_containerSocialMedia px-2">
            <a href="https://github.com/KevinRangels" class="socialMedia__btn fab fa-github " target="_blank" >
            </a>
            <a href="https://www.instagram.com/kevinrangels/" class="socialMedia__btn fab fa-instagram lead"  target="_blank">
            </a>
            <a href="https://www.facebook.com/kevin.rangels" class="socialMedia__btn fab fa-facebook-f  " target="_blank" >
            </a>
          </div>
        </div>
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
.info1_containerTop {
  display: flex;
  width: 100%;
}
.info1_photoProfile {
  width: 40%;
  /* height: 80px; */
  display: flex;
  justify-content: center;
}
.info1_photoProfile img {
  border: 3px solid gold;
  border-radius: 50%;
}
    
.info1_containerContact {
  width: 60%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.info1_label{
  color: gold;
  font-size: 20px;
  margin-bottom: 0;
}
.info1_name {
  color: #ffffff;
  font-size: 24px;
}
.info1_containerContact button {
  width: 100%;
  background: gold;
  color: #000000;
  outline: none;
  border: none;
  font-size: 14px;
  border-radius: 8px;
  padding: 2px 0;
}
.info1_containerSocialMedia {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}
.socialMedia__btn {
  color: gold;
  font-size: 22px;
}
.info1_text{
  color: #ffffff;
  font-size: 20px;
}
</style>
