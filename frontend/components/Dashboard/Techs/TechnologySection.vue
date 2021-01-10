<template>
  <div class="dashboardTechnologies">
    <div class="dashboardTechnologies__content">
      <div class="dashboardTechnologies__head d-flex justify-content-between">
        <h3>Technologies</h3>
        <div class="dashboardNav__btnRegister mb-4">
          <span>Register Language</span>
          <i class="fas fa-plus ml-3"></i>
        </div>
      </div>
      <div class="dashboardNav__btnRegister mb-4" v-b-modal.addTech>
          <span>Register Technology</span>
          <i class="fas fa-plus ml-3"></i>
      </div>
      <TechTable
        @handelGetTech="handelGetTech"
        @handelDeleteTech="handelDeleteTech"
        ref="tableTech"
      />
      
    </div>
    <ModalAddTech/>
    <ModalEditTech
      :tech="tech"
      ref="modalEditTech"
      @handleRefreshTable="handleRefreshTable"
    />
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
import ModalAddTech from '../../../components/Dashboard/Techs/ModalAddTech'
import ModalAddLanguage from '../../../components/ui/dashboard/ModalAddLanguage'
import ModalEditTech from '../../../components/Dashboard/Techs/ModalEditTech'
import TechTable from '../../../components/Dashboard/Techs/TechsTable'

export default {
  name: "dashboardTechnologies",
  props: ['data'],
  components: {
    TechTable,
    ModalAddTech,
    ModalAddLanguage
  },
  data() {
    return {
      tech: null
    };
  },
  methods: {
    handelGetTech (id) {
      this.$preloaders.open({component: Preloader})
        let request = this.$axios.$get(`api/technology/${id}`);
        request.then(res => {
          console.log('technology', res.data[0])
          this.tech = res.data[0]
          this.$refs.modalEditTech.showModal()
          this.$preloaders.close({ transition: 'preloaders' });
        });
    },
    handelDeleteTech (id) {
      this.$preloaders.open({component: Preloader})
        let request = this.$axios.$delete(`api/technology/${id}`);
        request.then(res => {
          console.log('technology delete', res.data)
          this.handleRefreshTable()
          this.$preloaders.close({ transition: 'preloaders' });
        });
    },
    handleRefreshTable () {
      this.$refs.tableTech.getTechnologies()
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
