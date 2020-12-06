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
export default {
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
