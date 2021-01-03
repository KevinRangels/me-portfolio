<template>
  <div class="ModalImagesProject">
    <b-modal v-model="modalShow" id="imgProject" centered size="lg" :hide-footer="true" :hide-header="true" body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Control Images</h3>
        <div class="projectsImgs__container">
          {{project}}
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
      modalShow: false
    };
  },
  mounted() {
  },
  methods: {
    showModal () {
      this.modalShow = true
    },
    closeModal () {
      this.modalShow = false
    }
  },
  watch:{
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

</style>
