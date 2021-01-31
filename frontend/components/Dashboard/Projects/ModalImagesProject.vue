<template>
  <div class="ModalImagesProject">
    <b-modal v-model="modalShow" id="imgProject" centered size="lg" :hide-footer="true" :hide-header="true" body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Control Images</h3>
        <p class="text-white">{{orderImages}}</p>
        <div class="projectsImgs__container">
          <div class="projectsImgs__sectionMode mb-3">
            <div class="projectsImgs__containerCheckOrder">
              <input type="checkbox" id="order" value="order" v-model="selectType" @change="handleSelectType($event)">
              <label for="order">Order</label>
            </div>
            <div class="projectsImgs__containerCheckPoster">
              <input type="checkbox" id="poster" value="poster" v-model="selectType" @change="handleSelectType($event)">
              <label for="poster">Poster</label>
            </div>
          </div>
          <div class="projectsImgs__containerImages mb-2" v-if="project !== null">
            <label class="projectsImgs__containeImage"
              v-for="(image, index) in project.images"
              :key="index"
              :id='image'
            >
              <img :src='image' alt="" class="img-fluid">
              <input
                v-if="selectType[0] === 'order'"
                type="checkbox"
                v-model="imageSelected"
                :id='image'
                :value='image'
                class="d-none"
              >
              <input
                v-if="selectType[0] === 'poster'"
                type="checkbox"
                v-model="imageSelectedPoster"
                @change="handleSelectPoster($event)"
                :id='image'
                :value='image'
                class="d-none"
              >
            </label>
          </div>
          <div class="projectsImgs__containerEnd">
            <div class="projectsImgs__containerPoster">
              <h3 class="ModalAddTech__title mb-3">Poster</h3>
              <div class="projectsImgs__containeImage">
                <img v-if="imageSelectedPoster.length > 0" :src='imageSelectedPoster[0]' alt="" class="img-fluid">
              </div>
            </div>
            <div class="projectsImgs__containerOrder">
              <h3 class="ModalAddTech__title mb-3">Order</h3>
              <div class="projectsImgs__containerImgsOrder" v-if="imageSelected.length > 0">
                <div class="projectsImgs__containeImage"
                  v-for="(image, index) in imageSelected"
                  :key="index"
                >
                  <img :src='image' alt="" class="img-fluid">
                  <span class="projectImgs__position">{{index + 1}}</span> 
                </div>
              </div>
            </div>
              
          </div>
            <div class="projectImgs__containerBtns w-100 mt-3">
              <button class="dashboard__mainBtn" @click="saveOrderImages">
                save
              </button>
            </div>
          <!-- <span class="text-white">{{imageSelected}}</span> -->
        </div>
    </b-modal>
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
import Multiselect from 'vue-multiselect'

export default {
  name: "ModalImagesProject",
  components: {
      Multiselect
  },
  props: {
    project: {
      default: null
    }
  },
  data() {
    return {
      modalShow: false,
      selectType: [],
      imageSelected: [],
      imageSelectedPoster: [],
      orderImages: [],
      posterImage: null
    };
  },
  mounted() {
    // this.getOrderImages()
  },
  methods: {
    showModal () {
      this.modalShow = true
    },
    closeModal () {
      this.modalShow = false
    },
    getOrderImages () {
      if (this.project.image_order.length > 0) {
        this.imageSelected = this.project.image_order
      }
    },
    handleSelectType (e) {
      this.selectType = []
      this.selectType.push(e.target.value)
      if (e.target.value === 'order') {
        this.getOrderImages()
      }
    },
    handleSelectPoster (e) {
      this.imageSelectedPoster = []
      this.imageSelectedPoster.push(e.target.value)
    },
    saveOrderImages () {
      const params = {
        images: this.orderImages
      }
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$post(`api/project-updated-order-images/${this.project.id}`, params);
      request.then(res => {
        console.log('order images project', res)
        this.$preloaders.close({ transition: 'preloaders' });
        // this.closeModal()
      });
    },
    savePosterImage () {
      const params = {
        image_poster: this.posterImage
      }
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$post(`api/project-updated-poster/${this.project.id}`, params);
      request.then(res => {
        console.log('order images project', res)
        this.$preloaders.close({ transition: 'preloaders' });
        this.closeModal()
      });
    }
  },
  watch:{
    imageSelected (newValue) {
      this.orderImages = []
      newValue.forEach(element => {
        const nameImage = element.split('http://127.0.0.1:8000/uploads/projects/')
        this.orderImages.push(nameImage[1])
      });
    },
    imageSelectedPoster (newValue) {
      newValue.forEach(element => {
        const nameImage = element.split('http://127.0.0.1:8000/uploads/projects/')
        this.posterImage = nameImage[1]
        this.savePosterImage()
      });
    }
  }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>
.dashboard__mainBtn{
    background-color: gold;
    color: #111;
    border-radius: 20px;
    padding: 7px 30px;
    border: none;
    font-weight: 500;
}
/deep/ .modalBody{
    background: #202020 !important;
}
.ModalAddTech__title{
    color: #ffffff;
}
.ModalAddProject__form{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.dashboardProfile__contentInput{
    width: 33%;
    padding: 0 20px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.dashboardProfile__contentInput p{
    color: #fff;
    margin-bottom: 20px;
}
.dashboardProfile__input{
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid gold;
    margin-bottom: 20px;
    background: none;
    outline: none;
    color: gold;
}
.projectsImgs__container {
  display: flex;
  flex-wrap: wrap;
}
.projectsImgs__sectionMode {
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.projectsImgs__containerCheckOrder {
  width: 15%;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.projectsImgs__containerCheckOrder label {
  color: #ffffff;
  margin-left: 8px;
  margin-bottom: 0;
}
.projectsImgs__containerCheckPoster {
  width: 15%;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.projectsImgs__containerCheckPoster label {
  color: #ffffff;
  margin-left: 8px;
  margin-bottom: 0;
}
.projectsImgs__containerImages {
  width: 100%;
  display: flex;
  overflow: hidden;
  overflow-x: auto;
}
.projectsImgs__containeImage {
  width: 120px;
  height: 120px;
  display: flex;
  margin-right: 15px;
  position: relative;
  cursor: pointer;
}
.projectImgs__position {
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: gold;
  color: #000;
  display: flex;
  justify-content: center;
  align-items: center;
  top: -8px;
  right: -8px;
  font-weight: bold;
}
.projectsImgs__containerEnd {
  width: 100%;
  display: flex;
}
.projectsImgs__containerPoster {
  width: 30%;
  border: 2px solid gold;
  padding: 10px;
}
.projectsImgs__containerOrder {
  width: 70%;
  border: 2px solid gold;
  padding: 10px;
}
.projectsImgs__containerImgsOrder {
    display: flex;
    flex-wrap: wrap;
    height: 300px;
    overflow-y: auto;
    justify-content: space-between;
    padding: 10px;
}
.projectImgs__containerBtns {
  display: flex;
  justify-content: flex-end;
}
</style>
