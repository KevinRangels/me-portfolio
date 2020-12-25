<template>
  <div class="panelMain">
    <MenuDeskopt
      v-show="viewMenuDeskopt"
      @handleMenuDeskopt="handleMenuDeskopt"
    />
    <div class="panelmain_control" v-show="!viewMenuDeskopt">
      <PanelHeader @handleMenuDeskopt="handleMenuDeskopt" />
      <div class="panelmain_container_info px-md-3">
        <div class="pannelmain_info_title">
          <h2 v-if="information == 1">Información Personal</h2>
          <h2 v-if="information == 2">Tecnologias</h2>
          <h2 v-if="information == 3">Proyectos</h2>
        </div>
        <PanelInfo :information="information" />
        <!-- MOVIL VIEW -->
        <NavMovil :nav="information" @handleOpenMenu="handleOpenMenu" />
        <InformationPersonal class="d-md-none" v-if="information === 1" />
        <div class="px-2 pt-5 d-md-none" v-if="information === 3">
          <ProyectContainer
            v-for="number in [0, 1, 2, 3, 4]"
            v-bind:key="number"
          />
        </div>
        <!--END MOVIL VIEW -->
      </div>

      <div class="panelmain_container_btns">
        <div
          @click="changueInformation_1"
          class="panelmain_btn"
          v-bind:class="[{ panelmain_active: information == 1 }]"
        >
          <i class="fa fa-user panelmain_btn_icon"></i>
        </div>
        <div
          @click="changueInformation_2"
          class="panelmain_btn"
          v-bind:class="[{ panelmain_active: information == 2 }]"
        >
          <i class="fas fa-briefcase panelmain_btn_icon"></i>
        </div>
        <div
          @click="changueInformation_3"
          class="panelmain_btn"
          v-bind:class="[{ panelmain_active: information == 3 }]"
        >
          <i class="fas fa-suitcase panelmain_btn_icon"></i>
        </div>
      </div>
    </div>
    <!-- INFORMACION PERSONAL Deskopt -->
    <InformationPersonalDeskopt v-if="information == 1" />
    <!-- TENCOLOGIAS -->
    <div v-if="information == 2" class="panelmain_information"></div>
    <!-- PORTAFOLIO -->
    <div v-if="information == 3" class="panelmain_information">
      <div class="panel_information_proyects">
        <ProyectContainer
          v-for="number in [0, 1, 2, 3, 4]"
          v-bind:key="number"
        />
      </div>
    </div>
    <MenuMovil v-show="viewMenuMovil" @handleCloseMenu="handleCloseMenu" />
  </div>
</template>

<script>
import PanelHeader from "@/components/PanelMain/PanelHeader.vue";
import MenuDeskopt from "@/components/Deskopt/Menu.vue";
import PanelInfo from "@/components/PanelMain/InfoDeskopt.vue";
import InformationPersonalDeskopt from "@/components/profile/PersonalInformation.vue";
import ProyectContainer from "@/components/ProyectContainer.vue";
import NavMovil from "@/components/movil/navMovil.vue";
import MenuMovil from "@/components/movil/Menu.vue";

export default {
  name: "PanelMain",
  components: {
    MenuDeskopt,
    PanelInfo,
    InformationPersonalDeskopt,
    ProyectContainer,
    NavMovil,
    MenuMovil
  },
  props: {
    msg: String
  },
  data() {
    return {
      viewMenuMovil: false,
      viewMenuDeskopt: false,
      information: 1
    };
  },
  methods: {
    changueInformation_1() {
      this.information = 1;
    },
    changueInformation_2() {
      this.information = 2;
    },
    changueInformation_3() {
      this.information = 3;
    },
    handleOpenMenu() {
      this.viewMenuMovil = true;
    },
    handleCloseMenu() {
      this.viewMenuMovil = false;
    },
    handleMenuDeskopt() {
      this.viewMenuDeskopt = !this.viewMenuDeskopt;
    }
  }
};
</script>

<style scoped>
.panelMain {
  width: 100%;
  height: 100vh;
  display: flex;
  background: #000;
}
.panelmain_control {
  width: 30%;
  height: 100%;
  border-radius: 24px;
  background: black;
  border: 3px solid gold;
  overflow: hidden;
}
.panelmain_container_info {
  height: 53%;
  padding-top: 7%;
  padding-bottom: 4%;
}
.pannelmain_info_title {
  color: gold;
}
.panelmain_container_btns {
  height: 7%;
  background: gold;
  display: flex;
}
.panelmain_btn {
  width: 100%;
  height: 100%;
  border: 1px solid gold;
  background: black;
  text-align: center;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: center;
  border-bottom: none;
}
.panelmain_btn_icon {
  font-size: 2rem;
  color: white;
}
.panelmain_active {
  background: gold;
}
.panelmain_information {
  border: 3px solid gold;
  width: 70%;
  height: 100%;
  display: flex;
  flex-direction: column;
  text-align: left;
  background: black;
  border-radius: 30px;
}
.panel_information_proyects {
  padding: 20px;
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  overflow-y: auto;
}
.info1_container_description {
  margin-bottom: 20px;
  width: 50%;
}
.info1_container {
  padding: 5%;
  overflow: auto;
  display: flex;
  flex-wrap: wrap;
}
.info1_label {
  color: gold;
  font-weight: 600;
  font-size: 1.5rem;
  margin-bottom: 0;
}
.info1_text {
  color: white;
  font-size: 1.3rem;
  font-weight: 300;
}
@media (min-width: 320px) and (max-width: 520px) {
  .panelmain_control {
    width: 100%;
    border: none;
    border-top: none;
  }
  .panelmain_information {
    display: none;
  }
  .pannelmain_info_title {
    display: none;
  }
  .panelmain_container_info {
    height: 93%;
    overflow-y: auto;
    padding-top: 0;
  }
  .panelmain_container_btns {
    height: 50px;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
}
</style>
