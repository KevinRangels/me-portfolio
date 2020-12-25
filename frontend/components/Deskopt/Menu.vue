<template>
  <div class="menuDeskopt">
    <div class="menuDeskopt__containerBtns">
      <div class="menuDeskopt__btnMenu">
        <i class="fas fa-times menuBtn__close" @click="closeMenu"></i>
      </div>
    </div>
    <ul class="menuDeskopt__listBtns mt-5">
      <li>Acerca de</li>
      <li>Ir a Blog</li>
      <li>Admin</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "MenuDeskopt",
  methods: {
    closeMenu() {
      this.$emit("handleMenuDeskopt");
    }
  }
};
</script>

<style scoped>
.menuDeskopt {
  width: 30%;
  height: 100%;
  border-radius: 24px;
  background: black;
  border: 3px solid gold;
  overflow: hidden;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
}
.menuDeskopt__containerBtns {
  position: absolute;
  width: 100%;
  display: flex;
  top: 0;
  left: 0;
}
.menuDeskopt__btnMenu {
  margin-left: 4%;
  margin-top: 4%;
}
.menuDeskopt__btnMenu i {
  color: #ffffff;
  font-size: 1.5rem;
  cursor: pointer;
}
.menuDeskopt__listBtns {
    list-style: none;
    padding: 0;
}
.menuDeskopt__listBtns li {
    color: #ffffff;
    font-size: 1.7rem;
    text-align: center;
    margin-bottom: 1rem;
    cursor: pointer;
}
</style>
