
<template>
    <div class="col-1 text-center d-none d-md-block sidebar bg-dark text-white" style=" padding: 15px 20px !important; height: 168px; width: 76px !important; margin-top:120px !important;">
    <div>
      <router-link to="/addProjects"> <img src="../assets/img/plus_menu.svg"></router-link>
    </div>
    <div>
      <router-link to="/porteur/home"><img src="../assets/img/associe_menu.png"></router-link>
    </div>
    <div>
      <router-link to="/searcher/home"><img src="../assets/img/projet_menu.png"></router-link>
    </div>
    </div>
</template>
<script>
export default {
name: 'SideBar',
data () {
  return {
      
  }
}
}
</script>
<style>
</style>
