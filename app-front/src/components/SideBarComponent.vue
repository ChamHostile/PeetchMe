
<template>
    <div class="row text-center bg-dark text-white p-4" style="height: 168px; margin-top:120px !important;">
      <div class="col-12 d-flex flex-column justify-content-between align-items-end ml-1">
          <router-link to="/addProjects"> <img src="../assets/img/plus_menu.svg"></router-link>
          <router-link to="/porteur/home"><img src="../assets/img/associe_menu.png"></router-link>
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
