<template>
  <div class="ModalAddProject">
    <b-modal id="addProject" centered size="lg" :hide-footer="true" :hide-header="true" body-class="modalBody">
        <h3 class="ModalAddTech__title mb-3">Add new project</h3>
        <form class="ModalAddProject__form" v-on:submit.prevent="addProject">
            <div class="dashboardProfile__contentInput">
              <p>Name</p>
              <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Link</p>
              <input v-model="link"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Repository</p>
              <input v-model="repository"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Date</p>
              <input v-model="date"  type="date" placeholder="Enter name" class="dashboardProfile__input"/>
            </div>
            <div class="dashboardProfile__contentInput">
              <p>Technologies</p>
              <multiselect v-model="techs" :options="technologies" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
                <template slot="selection" ><span class="multiselect__single" v-if="techs.length">{{ techs.length }} options selected</span></template>
              </multiselect>
              <span class="text-white">{{techsIds}}</span> 
              <!-- <multiselect v-model="techs" :options="technologies" label="name" :show-labels="false" :multiple="true" :close-on-select="false" :clear-on-select="false"></multiselect> -->
            </div>
            <div class="dashboardProfile__contentInput d-flex flex-column justify-content-center ">
              <p>Images</p>
              <label class="dashboard__mainBtn w-100 text-center" for="image_project">Update</label>
              <input id="image_project" type="file" ref="file" multiple="multiple" placeholder="Email" class="dashboardProfile__input d-none"/>
            </div>
            <div class="dashboardProfile__contentInput w-100">
              <p>Description</p>
              <textarea v-model="description" rows="5" placeholder="Enter description" class="dashboardProfile__contentInput-textarea w-100"/>
            </div>
            <div class="dashboardProfile__contentInput w-100">
              <p>Contribution</p>
              <textarea v-model="contribution" rows="5" placeholder="Enter contribution" class="dashboardProfile__contentInput-textarea w-100"/>
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
     name: '',
     link: '',
     repository: '',
     date: null,
     techs: [],
     description: '',
     contribution: '',
     technologies: null,
     techsIds: []
    };
  },
  mounted() {
    this.getTechnologies()
  },
  methods: {
    getTechnologies () {
      this.$preloaders.open({component: Preloader})
        let request = this.$axios.$get(`api/technologies`);
        request.then(res => {
          console.log('technologies', res)
          this.technologies = res.data
          this.$preloaders.close({ transition: 'preloaders' });
        });
    },
    addProject () {
      const formData = new FormData()
      for( let i = 0; i < this.$refs.file.files.length; i++ ){
        let images = this.$refs.file.files[i];
        formData.append('images[' + i + ']', images);
      }
      formData.append('name', this.name)
      formData.append('description', this.description)
      formData.append('contribution', this.contribution)
      formData.append('link', this.link)
      formData.append('repository', this.repository)
      formData.append('date', this.date)
      formData.append('technologies', this.techsIds.toString())
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$post(`api/project`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }});
      request.then(res => {
        console.log('post project', res)
        this.$bvModal.hide('addProject')
        this.$preloaders.close({ transition: 'preloaders' });
      });
    }
  },
  watch:{
     techs (newValue) {
       const ids = newValue.map(item => {
         return item.id
       })
       this.techsIds = ids
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
