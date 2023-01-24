
<template>
  <div class="row text-center mx-auto justify-content-center">
    <div class="col-4 d-flex justify-content-between align-items-center bg-white text-secondary p-3 shadow" style="margin-top:120px !important; border-radius: 20px !important;">
      <a href=""> <img src="../assets/img/profile_fill.svg" class="grey">
        <p class="d-none text-white">Profil</p>
      </a>
      <a href=""><img src="../assets/img/shelf_filled.svg">
        <p class="d-none text-white">Bibliothèque</p>
      </a>
      <a href=""><img src="../assets/img/chat_bubble.svg" class="grey" style="height: 28px;">
        <p class="d-none text-white">Message</p>
      </a>
      <a href=""><img src="../assets/img/project_dashboard.svg">
        <p class="d-none text-white">Abonnement</p>
      </a>
      <a href=""><img src="../assets/img/params_dashboard.svg">
        <p class="d-none text-white">Paramètres</p>
      </a>

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
.grey{
  filter: invert(96%) sepia(0%) saturate(1467%) hue-rotate(231deg) brightness(117%) contrast(77%);
}
.tab-active {
  filter: invert(100%) sepia(0%) saturate(7480%) hue-rotate(198deg) brightness(108%) contrast(108%);
}

.bg-active {
  background-color: #3F3FA6;
}
</style>
