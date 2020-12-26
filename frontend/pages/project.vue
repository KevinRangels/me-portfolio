<template>
  <div class="project py-3">
    <div class="container">
      <div v-swiper="swiperOption">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img
              src="../assets/img/Ultron/ultron-modal-deskopt.png"
              class="img-fluid"
              alt=""
            />
          </div>
          <div class="swiper-slide">
            <img
              src="../assets/img/Ultron/ultron_billboard-deskopt.png"
              class="img-fluid"
              alt=""
            />
          </div>
          <div class="swiper-slide">
            <img
              src="../assets/img/Ultron/ultron-products-deskopt.png"
              class="img-fluid"
              alt=""
            />
          </div>
        </div>
        <div class="swiper-pagination" slot="pagination"></div>
      </div>
      <div class="project__links">
        <div class="project__linkContainer">
          <i class="fas fa-globe"></i>
          <span>Ver proyecto</span>
        </div>
        <div class="project__linkContainer">
          <i class="fab fa-git-alt"></i>
          <span>Ver repositorio</span>
        </div>
      </div>
      <div class="project__name">
        <h4>Futura</h4>
      </div>
      <div class="project__description">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum amet
          nisi quos ipsum reprehenderit? Assumenda quas molestiae, aut impedit
          nostrum laudantium asperiores consequatur illo. Ab quod consequatur
          quae ratione praesentium.Voluptatibus perspiciatis, dolore architecto
          corrupti iusto modi voluptatem possimus facere maiores eius dicta ut,
          quam aspernatur delectus non voluptate mollitia repellendus quod odio
          fugiat accusantium! Veritatis adipisci officia maiores ea!
        </p>
      </div>
      <h5 class="project__subtitle">Tecnologias usadas</h5>
      <div class="project__techsContainer">
        <div
          class="proyectInfo_techs mb-3"
          v-for="number in [0, 1, 2, 3, 4]"
          v-bind:key="number"
        >
          <div class="proyectInfo_techContainerImg p-1  px-md-3">
            <img src="../assets/img/html5.svg" class="img-fluid" alt="" />
          </div>
          <div class="proyectInfo_techContainerName">
            <h4>Html</h4>
          </div>
        </div>
      </div>
      <h5 class="project__subtitle">Contribucion</h5>
      <div class="project__description">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum amet
          nisi quos ipsum reprehenderit? Assumenda quas molestiae, aut impedit
          nostrum laudantium asperiores consequatur illo. Ab quod consequatur
          quae ratione praesentium.Voluptatibus perspiciatis, dolore architecto
          corrupti iusto modi voluptatem possimus facere maiores eius dicta ut,
          quam aspernatur delectus non voluptate mollitia repellendus quod odio
          fugiat accusantium! Veritatis adipisci officia maiores ea!
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      information: 0,
      swiperOption: {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 1,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true
        },
        pagination: {
          el: ".swiper-pagination"
        }
      }
    };
  },
  // components:{
  //   swiper,swiperSlide
  // },
  methods: {},
  mounted() {}
};
</script>

<style>
.project {
  background-color: #000;
}
.swiper-container {
  width: 100%;
  padding-top: 10px;
  padding-bottom: 50px;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 400px;
  height: 400px;
  display: flex;
  align-items: center;
  /* background: red; */
}
.swiper-slide-active {
  transform: scale(1.5) !important;
  transition: 0.7s ease all !important;
}
.project__links {
  width: 100%;
  display: flex;
  justify-content: center;
}
.project__linkContainer {
  width: 30%;
  display: flex;
  align-items: center;
  cursor: pointer;
  justify-content: center;
}
.project__linkContainer i {
  color: #ffffff;
  font-size: 1.3rem;
  margin-right: 10px;
}
.project__linkContainer span {
  color: #ffffff;
  font-size: 1.3rem;
}
.project__name h4 {
  color: gold;
  font-size: 2.3rem;
}
.project__description p {
  color: #ffffff;
  font-size: 1.2rem;
  text-align: justify;
}
.project__subtitle {
  color: #ffffff;
  font-size: 1.5rem;
}
.project__techsContainer {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}
.proyectInfo_techs {
  width: 30%;
  display: flex;
  align-items: center;
  height: 35px;
  background: #000;
  border: 1px solid gold;
  border-radius: 14px;
}
.proyectInfo_techContainerImg {
  width: 20%;
  display: flex;
  height: 100%;
  justify-content: center;
  /* align-items: center; */
}
.proyectInfo_techContainerName {
  width: 70%;
  color: #ffffff;
}
.proyectInfo_techContainerName h4 {
  margin-bottom: 0;
  font-size: 1.2rem;
}
@media (min-width: 320px) and (max-width: 520px) {
  .swiper-slide {
    width: 100%;
    height: 200px;
  }
  .swiper-slide-active {
    transform: initial !important;
  }
  .project__links {
    flex-direction: column;
  }
  .project__linkContainer {
    width: 100%;
  }
  .proyectInfo_techs {
    width: 46%;
  }
  .proyectInfo_techContainerImg {
    width: 25%;
  }
  .proyectInfo_techContainerName h4 {
    font-size: 1rem;
  }
}
</style>
