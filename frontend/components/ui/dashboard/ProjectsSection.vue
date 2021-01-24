<template>
  <div class="dashboardTechnologies">
    <div class="dashboardTechnologies__content">
      <div class="dashboardTechnologies__head d-flex justify-content-between">
        <h3>Projects</h3>
        <div class="dashboardNav__btnRegister mb-4" v-b-modal.addProject>
          <span>Register Project</span>
          <i class="fas fa-plus ml-3"></i>
        </div>
      </div>
      <ProjectsTable
        ref="tableProject"
        @handleModalEdit="handleModalEdit"
        @handleModalImages="handleModalImages"
      />
    </div>
    <ModalImagesProject
      :project='project'
      ref="modalProjectImages"
      @handleRefreshTable="handleRefreshTable"
    />
    <ModalEditProject
      :project='project'
      ref="modalEditProject"
      @showModalControlImage="showModalControlImage"
      @handleRefreshTable="handleRefreshTable"
    />
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
import ProjectsTable from '../../../components/Dashboard/Projects/ProjectsTable'
import ModalImagesProject from '../../Dashboard/Projects/ModalImagesProject'
import ModalEditProject from '../../Dashboard/Projects/ModalEditProject'
export default {
  name: "dashboardTechnologies",
  props: ['data'],
  components: {
    ProjectsTable,
    ModalImagesProject,
    ModalEditProject
  },
  data() {
    return {
      project: null
    };
  },
  methods: {
     handleModalEdit (id) {
       this.$preloaders.open({component: Preloader})
       let request = this.$axios.$get(`api/project/${id}`);
       request.then(res => {
         console.log('project', res)
         this.project = res.data[0]
         this.$refs.modalEditProject.showModal()
         this.$preloaders.close({ transition: 'preloaders' });
       });
     },
      handleModalImages(id) {
        this.$preloaders.open({component: Preloader})
        let request = this.$axios.$get(`api/project/${id}`);
        request.then(res => {
          console.log('project', res)
          this.project = res.data[0]
          this.$refs.modalProjectImages.showModal()
          this.$preloaders.close({ transition: 'preloaders' });
        });
      },
      handleRefreshTable() {
        this.$refs.tableProject.getProjects()
      },
      showModalControlImage () {
         this.$refs.modalEditProject.closeModal()
         this.handleModalImages(this.project.id)
      }
  },
  watch:{
     
  }
};
</script>

<style lang="scss" scoped>
.dashboard__mainBtn{
    background-color: gold;
    color: #111;
    border-radius: 20px;
    padding: 7px 30px;
    border: none;
    font-weight: 500;
}
.dashboardNav__btnRegister{
    background: gold;
    color: #000;
    padding: 10px;
    border-radius: 7px;
    cursor: pointer;
    font-weight: 600;
    width: max-content;
}
.dashboardTechnologies {
  padding: 20px;
}
.dashboardTechnologies__content {
  background-color: #000;
  padding: 15px;
}
.dashboardTechnologies__content h3 {
  color: #fff;
  font-size: 34px;
}

</style>
