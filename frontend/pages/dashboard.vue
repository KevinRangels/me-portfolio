<template>
  <div class="dashboard">
    <div class="dashboard__nav">
      <dashboardNav
        @handleGetSection="getSection"
      />
    </div>
    <div class="dashboard__content">
      <dashboardHeader/>
      <dashboardHome v-if="view === 'Home'"/>
      <dashboardProfile v-if="view === 'Profile' && data !== null" :data="data"/>
      <dashboardTechnologies v-if="view === 'Technologies'"/>
    </div>
    
  </div>
</template>

<script>
import dashboardNav from '../components/ui/dashboard/Nav'
import dashboardHeader from '../components/ui/dashboard/Header'
import dashboardHome from '../components/ui/dashboard/HomeSection'
import dashboardProfile from '../components/ui/dashboard/ProfileSection'
import dashboardTechnologies from '../components/ui/dashboard/TechnologySection'
import Preloader from '../components/ui/Preloader'

export default {
  data() {
    return {
     view: 'Home',
     data: null,  
    };
  },
  components:{
    dashboardNav,
    dashboardHeader,
    dashboardHome,
    dashboardProfile,
    dashboardTechnologies
  },

  methods: {
    getSection(section){
      this.view = section;
    },
    getProfile(){
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$get("api/user");
      request.then(res => {
        this.data = res.data;
        console.log(this.data)
        this.$preloaders.close({ transition: 'preloaders' });
      });
    }
  },
  mounted() {
  },
  watch: {
    view(newValue){
      if(newValue === 'Profile'){
        this.getProfile();
      }
    }
  }
};
</script>

<style>
  .dashboard{
    display: flex;
  }
  .dashboard__nav{
    width: 20%;
  }
  .dashboard__content{
    width: 80%;
    background-color: #202020;
    height: 100vh;
    overflow-y: scroll;
  }
</style>
