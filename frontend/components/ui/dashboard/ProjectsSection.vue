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
      <ProjectsTable/>
    </div>
  </div>
</template>

<script>
// import Preloader from '../../../components/ui/Preloader'
import ProjectsTable from '../../../components/Dashboard/Projects/ProjectsTable'
export default {
  name: "dashboardTechnologies",
  props: ['data'],
  components: {
    ProjectsTable
  },
  data() {
    return {
     
    };
  },
  methods: {
      
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
