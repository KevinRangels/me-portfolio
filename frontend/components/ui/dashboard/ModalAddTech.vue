<template>
  <div class="ModalAddTech">
    <b-modal id="addTech" centered size="lg" :hide-footer='true' :hide-header='true' body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Add new technology</h3>
        <form class="ModalAddTech__form" v-on:submit.prevent="addTechnology">
            <div class="dashboardProfile__contentInput">
              <p>Name</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Language</p>
              <multiselect v-model="languageSelected" :options='languages' label="name" :show-labels="false"></multiselect>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Branch</p>
              <multiselect v-model="branch" :options="optionsBranch" :show-labels="false"></multiselect>
            </div>
            
            <div class="dashboardProfile__contentInput w-50">
              <p>Skills</p>
              <multiselect v-model="skills" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" :show-labels="false" :options="optionsSkills" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
            </div>
            <div class="dashboardProfile__contentInput w-50  d-flex flex-column justify-content-center ">
              <p>Image</p>
              <input type="file" ref="file" placeholder="Email" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput w-100">
              <p>Description</p>
              <textarea v-model="description" rows="5" placeholder="Enter description" class="dashboardProfile__contentInput-textarea w-100"/>
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
     languageSelected: null,
     skills: [],
     branch: null,
     optionsBranch:['Web frontend', 'Backend', 'Movil'],
     optionsSkills: [],
     languages: null,
     description: null
    };
  },
  mounted () {
    this.getLanguages()
  },
  methods: {
      getLanguages () {
        this.$preloaders.open({component: Preloader})
        let request = this.$axios.$get(`api/languages`);
        request.then(res => {
          console.log('Languages', res)
          this.languages = res.data
          this.$preloaders.close({ transition: 'preloaders' });
        });
      },
      addTechnology () {
        const formData = new FormData()
        formData.append('image', this.$refs.file.files[0])
        formData.append('language_id', this.languageSelected.id)
        formData.append('name', this.name)
        formData.append('description', this.description)
        formData.append('branch', this.branch)
        formData.append('skills', this.skills.toString())
        console.log(formData)
        this.$preloaders.open({component: Preloader})
        let request = this.$axios.$post(`api/technology`, formData);
        request.then(res => {
          console.log('post technology', res)
          this.$bvModal.hide('addTech')
          this.$preloaders.close({ transition: 'preloaders' });
        });
      },
    addTag (newTag) {
      this.optionsSkills.push(newTag)
      this.skills.push(newTag)
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
