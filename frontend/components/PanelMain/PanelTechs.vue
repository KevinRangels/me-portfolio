<template>
  <div class="panelTechs">
    <div class="panelTechs__containerFilters mb-4">
      <div class="panelTechs__filterInputContainer">
          <span class="mr-3">Buscar una tecnologia:</span>
          <input type="text" placeholder="Buscar...">
      </div>
    </div>
    <TechCard
      v-for="number in [0, 1, 2, 3, 4, 5, 6]"
      :key="number"
    />
  </div>
</template>

<script>
import TechCard from "@/components/TechCard.vue";

export default {
  name: 'PanelTechs',
  components: {
    TechCard
  }
}
</script>

<style scoped>
.panelTechs {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    overflow-y: auto;
}
.panelTechs__containerFilters {
    width: 100%;
    display: flex;
}
.panelTechs__containerFilters span {
    color: gold;
}
.panelTechs__filterInputContainer input {
    background: none;
    border: none;
    border-bottom: 1px solid gold;
    outline: none;
    color: gold;
}
@media (min-width: 320px) and (max-width: 520px) {
  .panelTechs__containerFilters{
      margin-top: 2rem;
  }
  .panelTechs__filterInputContainer input {
      width: 50%;
  }
}
</style>