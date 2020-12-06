<template>
  <div class="dashboardNav">
    <div class="dashboardNav__brand mb-4">
        <h4> <span><</span> KR <span>/></span></h4>
    </div>
    <div class="dashboardNav__btnRegister mb-4">
        <span>Register project</span>
        <i class="fas fa-plus ml-3"></i>
    </div>
    <ul class="dashboardNav__list">
      <li class="dashboardNav__listBtn" 
        @click="getSection('Home')" 
        v-bind:class="[{ activeBtn: active === 'Home'  }]">
        <i class="fas fa-home mr-3"></i>Home</li>

      <li class="dashboardNav__listBtn" 
        @click="getSection('Profile')"
        v-bind:class="[{ activeBtn: active === 'Profile'  }]">
        <i class="fas fa-user mr-3"></i>Profile</li>

      <!-- <li class="dashboardNav__listBtn" 
        @click="getSection('Language')"
        v-bind:class="[{ activeBtn: active === 'Language'  }]">
        <i class="fas fa-splotch mr-3"></i>Language</li> -->

      <li class="dashboardNav__listBtn" 
        @click="getSection('Technologies')"
        v-bind:class="[{ activeBtn: active === 'Technologies'  }]">
        <i class="fas fa-laptop-code mr-3"></i>Technologies</li>

      <li class="dashboardNav__listBtn" 
        @click="getSection('Projects')"
        v-bind:class="[{ activeBtn: active === 'Projects'  }]">
        <i class="fas fa-code mr-3"></i>Projects</li>
    </ul>
  </div>
</template>

<script>

export default {
  name: 'dashboardNav',
  data() {
    return {
     active: 'Home'  
    };
  },
  methods: {
    getSection(section){
      this.$emit('handleGetSection', section);
      this.active = section;
    }
  }
};
</script>

<style lang="scss" scoped>
.dashboardNav{
    width: 100%;
    height: 100vh;
    background-color: #000;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
}
.dashboardNav__brand{
    color: gold;
}
.dashboardNav__btnRegister{
    background: gold;
    color: #000;
    padding: 10px;
    border-radius: 7px;
    cursor: pointer;
    font-weight: 600;
}
.dashboardNav__list{
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.dashboardNav__listBtn{
    color: #fff;
    padding: 10px 0;
    cursor: pointer;
    font-weight: 600;
}
.dashboardNav__listBtn:hover{
    color: gold;
}
.activeBtn{
  color: gold;
}
</style>