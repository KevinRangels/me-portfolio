<template>
  <div class="panelHeader">
    <div class="panelHeader__avatar"></div>
    <div class="panelHeader__containerName">
      <h1 class="panelHeader__name">Kevin Rangel</h1>
    </div>
    <div class="panelHeader__containerOption">
      <button class="mb-3">Contactame</button>
      <div class="info1_containerSocialMedia px-2">
        <a
          href="https://github.com/KevinRangels"
          class="socialMedia__btn fab fa-github "
          target="_blank"
        >
        </a>
        <a
          href="https://www.instagram.com/kevinrangels/"
          class="socialMedia__btn fab fa-instagram lead"
          target="_blank"
        >
        </a>
        <a
          href="https://www.facebook.com/kevin.rangels"
          class="socialMedia__btn fab fa-facebook-f  "
          target="_blank"
        >
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PanelHeader"
};
</script>

<style scoped>
.panelHeader {
  width: 100%;
  height: 40%;
  border: 1px solid red;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
  align-items: center;
  padding-top: 10px;
}
.panelHeader__avatar {
  border: 2px solid gold;
  width: 170px;
  height: 170px;
  border-radius: 50%;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 10px;
}
.panelHeader__name {
  color: white;
}
.panelHeader__containerOption {
    width: 45%;
}
.panelHeader__containerOption button {
  width: 100%;
  background: gold;
  color: #000000;
  outline: none;
  border: none;
  font-size: 14px;
  border-radius: 8px;
  padding: 3px 0;
}
.info1_containerSocialMedia {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}
.socialMedia__btn {
  color: gold;
  font-size: 22px;
  text-decoration: none;
}
.info1_text {
  color: #ffffff;
  font-size: 20px;
}
@media (min-width:320px) and (max-width:520px){
  .panelHeader {
      display: none;
  }
}
</style>
