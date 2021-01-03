<template>
  <div class="projectTableList mt-2">
    <div class="projectTable__bodyItem">
      <span>{{data.name}}</span>
    </div>
    <div class="projectTable__bodyItem">
      <a :href='data.link' target="_blank">{{data.link}}</a>
    </div>
    <div class="projectTable__bodyItem">
      <a :href='data.repository' target="_blank">{{data.repository}}</a>
    </div>
    <div class="projectTable__bodyItem">
      <span>{{data.date}}</span>
    </div>
    <div class="projectTable__bodyItem">
      <div class="projectTable__btnOption ml-3" @click="showBtn">
        <i class="fas fa-plus"></i>
        <div class="projectTable__optionsContainer" v-if="viewBtn">
          <ul>
            <li>Edit Project</li>
            <li>View Project</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'projectTableList',
  props: {
    data: {
      default: null
    }
  },
  data () {
    return {
      viewBtn: false
    }
  },
  methods: {
    showBtn () {
      this.viewBtn = !this.viewBtn
    }
  }
}
</script>

<style scoped>
.projectTableList {
  width: 100%;
  display: flex;
  justify-content: space-between;
}
.projectTable__bodyItem {
  width: 20%;
}
.projectTable__bodyItem span {
  color: #ffffff;
  font-size: 16px;
}
.projectTable__btnOption {
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: gold;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
}
.projectTable__optionsContainer {
  background: gold;
  position: absolute;
  top: -5px;
  left: -108px;
  width: max-content;
  border-radius: 10px;
  padding: 8px;
}
.projectTable__optionsContainer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.projectTable__optionsContainer ul li{
  cursor: pointer;
}
</style>