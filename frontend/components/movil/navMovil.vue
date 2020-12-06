<template>
  <div class="navMovil px-2 d-md-none">
      <h3>Proyectos</h3>
  </div>
</template>

<script>
export default {
  name: 'navMovil',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .navMovil{
      background: gold;
      display: flex;
      justify-content: start;
      position: absolute;
      width: 100%;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
  }
</style>
