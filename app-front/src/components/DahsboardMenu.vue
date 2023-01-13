
<template>
  <div class="mx-auto text-center row">
    <div class="col-4 text-center d-none d-md-block sidebar bg-white text-secondary p-5" style="  margin-top:120px !important; border-radius: 20px !important;">
      <router-link to="/addProjects"> <img src="../assets/img/plus_menu.svg"></router-link>
      <router-link to="/porteur/home"><img src="../assets/img/associe_menu.png"></router-link>
      <router-link to="/searcher/home"><img src="../assets/img/projet_menu.png"></router-link>
    </div>
  </div>
</template>
<script>
export default {
name: 'DashboardMenu',
data () {
  return {
      
  }
}
}
</script>
<style>
</style>
