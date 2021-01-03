<template>
  <div class="projectTable mt-3">
    <div class="projectTable__header">
      <div class="projectTable__headerItem">
        <span>Name</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Link</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Repository</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Date</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Options</span>
      </div>
    </div>
    <ProjectTableList
      v-for="project in projects"
      :key="project.id"
      :data='project'
    />
  </div>
</template>

<script>
import ProjectTableList from '../../../components/Dashboard/Projects/ProjectTableList'
import Preloader from '../../../components/ui/Preloader'
export default {
  name: 'ProjectTable',
  components: {
    ProjectTableList
  },
  data () {
    return {
      projects: null
    }
  },
  mounted () {
    this.getProjects()
  },
  methods: {
    getProjects () {
      this.$preloaders.open({component: Preloader})
        let request = this.$axios.$get(`api/projects`);
        request.then(res => {
          console.log('projects', res)
          this.projects = res.data
          this.$preloaders.close({ transition: 'preloaders' });
        });
    }
  }
}
</script>

<style scoped>
.projectTable {
    width: 100%;
    display: flex;
    flex-direction: column;
}
.projectTable__header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ffffff;
}
.projectTable__headerItem {
    width: 20%;
    /* text-align: center; */
}
.projectTable__headerItem span {
    color: gold;
    font-weight: bold;
    font-size: 20px;
}
</style>