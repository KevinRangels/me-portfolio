import Vue from 'vue'
import VueAwesomeSwiper from 'vue-awesome-swiper/dist/ssr'
import { directive } from 'vue-awesome-swiper'

Vue.use(VueAwesomeSwiper)

export default {
    directives: {
      swiper: directive
    }
  }