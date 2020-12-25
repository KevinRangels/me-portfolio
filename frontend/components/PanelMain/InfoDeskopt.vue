<template>
  <div class="panelmain__info">
    <div class="panelmain__infoContainer" v-if="information == 1">
      <p>Sección que da a conocer información relevante a mi persona</p>
    </div>
    <div class="panelmain__infoContainer" v-if="information == 2">
      <p>
        Esta sección muestra cuáles son las herramientas y técnicas que he usado
        en distintas tecnologías a la hora del desarrollo
      </p>
    </div>
    <div class="panelmain__infoContainer" v-if="information == 3">
      <p>
        Esta sección da a conocer los proyectos que he realizado y tecnologías
        utilizadas en estos
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "InfoDeskopt",
  props: {
    information: {
      default: null,
      type: Number
    }
  }
};
</script>

<style scoped>
  .panelmain__info {
    width: 100%;
  }
  .panelmain__infoContainer {
      display: flex;
      flex-direction: column;
  }
  .panelmain__infoContainer p{
    color: white;
    font-size: 1.3rem;
  }
@media (min-width: 320px) and (max-width: 520px) {
  .panelmain__infoText {
    display: none;
  }
}
</style>
