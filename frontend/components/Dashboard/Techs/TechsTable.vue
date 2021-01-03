<template>
  <div class="projectTable mt-3">
    <div class="projectTable__header">
      <div class="projectTable__headerItem">
        <span>Name</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Language</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Branch</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Image</span>
      </div>
      <div class="projectTable__headerItem">
        <span>Options</span>
      </div>
    </div>
    <TechsTableList
      v-for="techs in technologies"
      :key="techs.id"
      :data='techs'
    />
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
import TechsTableList from '../../../components/Dashboard/Techs/TechsTableList'
export default {
  name: 'ProjectTable',
  components: {
    TechsTableList
  },
  data () {
    return {
      technologies: null
    }
  },
  mounted () {
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