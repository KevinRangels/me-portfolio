<template>
  <div class="navMovil p-2 d-md-none">
    <div class="navMovil__titles">
      <h3 v-if="nav === 1">Sobre mí</h3>
      <h3 v-if="nav === 2">Tecnologias</h3>
      <h3 v-if="nav === 3">Proyectos</h3>
    </div>
    <div class="navMovil__btn">
      <i class="fas fa-align-justify"></i>
    </div>
  </div>
</template>

<script>
export default {
  name: 'navMovil',
  props: {
    nav: {
      default: null
    }
  }
}
</script>

<style scoped>
.navMovil {
  background: gold;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: absolute;
  width: 100%;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
}
.navMovil h3 {
  margin-bottom: 0;
}
.navMovil__btn i {
  font-size: 22px;
}
</style>
