<template>
  <div class="project">
    <div v-swiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          Render original HTML in server, render Swiper in browser (client)
        </div>
        <div class="swiper-slide">
          Render original HTML in server, render Swiper in browser (client)
        </div>
        <div class="swiper-slide">
          Render original HTML in server, render Swiper in browser (client)
        </div>
      </div>
      <div class="swiper-pagination" slot="pagination"></div>
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
  methods: {
    
    },
  mounted() {
  }
};
</script>

<style>
.project{
    background-color: #111;
}
.swiper-container {
  width: 100%;
  padding-top: 50px;
  padding-bottom: 50px;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 300px;
  height: 300px;
  background: red;
}
</style>
