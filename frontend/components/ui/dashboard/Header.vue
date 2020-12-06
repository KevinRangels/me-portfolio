<template>
  <div class="dashboardHeader">
    <i class="fas fa-bell"></i>
    <div class="dashboardHeader__avatar mr-2 ml-3">

    </div>
    <span class="dashboardHeader__user">Kevin Rangel</span>
  </div>
</template>

<script>

export default {
  name: 'dashboardHeader',
};
</script>

<style lang="scss" scoped>
.dashboardHeader{
    width: 100%;
    background-color: #000;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 20px 20px;
}
.dashboardHeader i {
    color: #fff;
}
.dashboardHeader__avatar{
    width: 30px;
    height: 30px;
    border-radius: 100%;
    background-color: silver;
}
.dashboardHeader__user{
    color: #fff;
    font-weight: 600;
}

</style>