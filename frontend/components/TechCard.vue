<template>
  <div class="techCard p-3 mb-3">
   <div class="techCard__containerImg mr-3">
    <img src="../assets/img/html5.svg" class="img-fluid" alt="">
   </div>
   <div class="techCard__containerInfo">
       <div class="techCard__containerName">
           <h3>HTML5</h3>
       </div>
       <div class="techCard__containerDescription">
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae mollitia dolorem illo magnam provident voluptas, doloremque molestiae nulla eum rerum quod, aliquid tempore placeat quos, quo ea quam obcaecati recusandae?</p>
       </div>
       <div class="techCard__containerBtn">
           <button>Ver proyectos</button>
       </div>
   </div>
  </div>
</template>

<script>
export default {
  name: 'TechCard'
}
</script>

<style scoped>
 .techCard {
     width: 46%;
     height: 200px;
     border: 3px solid gold;
     border-radius: 10px;
     overflow: hidden;
     display: flex;
 }
 .techCard__containerImg {
     width: 30%;
     display: flex;
     justify-content: center;
     align-items: center;
 }
 .techCard__containerInfo {
     width: 70%;
     display: flex;
     flex-direction: column;
     justify-content: space-between;
 }
.techCard__containerName {
    width: 100%;
    border-bottom: 1px solid gold;
    height: 18%;
}
.techCard__containerName h3 {
    color: #ffffff
}
.techCard__containerDescription {
    width: 100%;
    height: 60%;
    overflow: hidden;
}
.techCard__containerDescription p {
    color: gold;
}
.techCard__containerBtn {
    height: 15%;
    display: flex;
    justify-content: flex-end;
}
.techCard__containerBtn button {
    background: none;
    border: none;
    color: #ffffff;
    font-weight: bold;
}
@media (min-width: 320px) and (max-width: 520px) {
  .techCard {
      width: 100%;
  }
}
</style>