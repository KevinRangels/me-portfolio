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
      v-for="index in [1,2,3,4,5]"
      :key="index"
    />
  </div>
</template>

<script>
import ProjectTableList from '../../../components/Dashboard/Projects/ProjectTableList'
export default {
  name: 'ProjectTable',
  components: {
    ProjectTableList
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