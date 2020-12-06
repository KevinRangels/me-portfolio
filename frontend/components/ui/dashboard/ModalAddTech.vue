<template>
  <div class="ModalAddTech">
    <b-modal id="addTech" centered size="lg" hide-footer="true" hide-header="true" body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Add new technology</h3>
        <form class="ModalAddTech__form">
            <div class="dashboardProfile__contentInput">
              <p>Name</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Language</p>
              <multiselect v-model="value" :options="options" :show-labels="false"></multiselect>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Branch</p>
              <multiselect v-model="branch" :options="optionsBranch" :show-labels="false"></multiselect>
            </div>
            
            <div class="dashboardProfile__contentInput w-50">
              <p>Skills</p>
              <multiselect v-model="skills" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :show-labels="false" :options="optionsSkills" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
            </div>
            <div class="dashboardProfile__contentInput w-50  d-flex flex-column justify-content-center ">
              <p>Image</p>
              <input type="file" @change="cv_image" placeholder="Email" class="dashboardProfile__input"/>
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
  name: "ModalAddTech",
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
.ModalAddTech__form{
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
