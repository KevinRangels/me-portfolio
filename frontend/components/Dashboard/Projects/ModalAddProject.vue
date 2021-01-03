<template>
  <div class="ModalAddProject">
    <b-modal id="addProject" centered size="lg" hide-footer="true" hide-header="true" body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Add new project</h3>
        <form class="ModalAddProject__form">
            <div class="dashboardProfile__contentInput">
              <p>Name</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Link</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Repository</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Date</p>
              <input v-model="name"  type="date" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Technologies</p>
              <multiselect v-model="value" :options="options" :show-labels="false"></multiselect>
            </div>
            <div class="dashboardProfile__contentInput d-flex flex-column justify-content-center ">
              <p>Images</p>
              <label class="dashboard__mainBtn w-100 text-center" for="image_project">Update</label>
              <input id="image_project" type="file" @change="cv_image" placeholder="Email" class="dashboardProfile__input d-none"/>
            </div>
            <div class="dashboardProfile__contentInput w-100">
              <p>Description</p>
              <textarea v-model="name" rows="5" placeholder="Enter description" class="dashboardProfile__contentInput-textarea w-100"/>
            </div>
            <div class="dashboardProfile__contentInput w-100">
              <p>Contribution</p>
              <textarea v-model="name" rows="5" placeholder="Enter contribution" class="dashboardProfile__contentInput-textarea w-100"/>
            </div>
            
            
          <div class="w-100 d-flex justify-content-end ">
              <button class="dashboard__mainBtn" type="submit">Save</button>
          </div>
        </form>
    </b-modal>
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
import Multiselect from 'vue-multiselect'

export default {
  name: "ModalAddProject",
  components: {
      Multiselect
  },
  props: ['data'],
  data() {
    return {
     value: null,
     skills: [],
     branch: null,
     options: ['list', 'of', 'options'],
     optionsBranch:['Web frontend', 'Backend', 'Movil'],
     optionsSkills: []
    };
  },
  methods: {
      addTag (newTag) {
      const tag = {
        name: newTag,
      }
      this.optionsSkills.push(tag)
      this.skills.push(tag)
    },
    cv_image(){

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
.dashboardProfile__contentInput-textarea{
    display: block;
    border-radius: 8px;
    width: 100%;
    border: 2px solid gold;
    margin-bottom: 20px;
    background: none;
    outline: none;
    color: gold;
    padding: 4px;
}


</style>
