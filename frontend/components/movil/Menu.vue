<template>
  <div class="menuMovil" id="menuMovil">
    <div class="menuMovil__container p-2">
    <div class="menuMovil__containerBtnClose w-100 d-flex justify-content-end">
      <i class="fas fa-times menuBtn__close"  @click="closeOutSelectStatus"></i>
    </div>
    <ul class="menuMovil__listBtns">
      <li>Acerca de</li>
      <li>Ir a Blog</li>
      <li>Admin</li>
    </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MenuMovil',
  methods: {
    closeOutSelectStatus () {
      this.$emit('handleCloseMenu')
    }
  }
}
</script>

<style scoped>
.menuMovil {
  height: 100vh;
  width: 45%;
  position: absolute;
  background: #000000;
  top: 0;
  right: 0;
}
.menuBtn__close {
  color: #ffffff;
  font-size: 24px;
}
.menuMovil__listBtns {
  color: #ffffff;
  font-size: 18px;
  list-style: none;
  padding: 0;
}
.menuMovil__listBtns li {
  margin-bottom: 8px;
}
</style>