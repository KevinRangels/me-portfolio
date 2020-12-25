<template>
  <div>
    <Billboard 
      v-if="viewBillboard"
      @handleShowPanel="showPanel" 
    />
    <PanelMain 
      v-if="viewPanelMain" 
    />
  </div>
</template>

<script>
import Billboard from '@/components/Billboard.vue'
import PanelMain from '@/components/PanelMain/PanelMain.vue'
export default {
  components: {
    Billboard,
    PanelMain
  },
  data () {
    return {
      viewBillboard: true,
      viewPanelMain: false
    }
  },
  methods: {
    showPanel () {
      this.viewBillboard = false
      this.viewPanelMain = true
    }
  }
}
</script>

<style>

</style>
