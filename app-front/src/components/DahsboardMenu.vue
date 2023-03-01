
<template>
  <div class="row text-center mx-auto justify-content-center">
    <div class="col-4 d-flex justify-content-between align-items-center bg-white text-secondary p-3 shadow" style="margin-top:120px !important; border-radius: 20px !important;">
    
      <a href="" @click.prevent="tabActive(1)" :class="(currentTab == 1)?'tab-active bg-active': ''"> <img src="../assets/img/profile_fill.svg" class="svg">
        <p class="d-none text-white">Profil</p>
      </a>
      <a href="" @click.prevent="tabActive(2)" :class="(currentTab == 2)?'tab-active bg-active': ''"><img src="../assets/img/shelf_filled.svg">
        <p class="d-none text-white">Bibliothèque</p>
      </a>
      <a href="" @click.prevent="tabActive(3)" :class="(currentTab == 3)?'tab-active bg-active': ''"><img src="../assets/img/chat_bubble.svg" class="grey" style="height: 28px;">
        <p class="d-none text-white">Message</p>
      </a>
      <a href="" @click.prevent="tabActive(4)" :class="(currentTab == 4)?'tab-active bg-active': ''"><img src="../assets/img/project_dashboard.svg">
        <p class="d-none text-white">Abonnement</p>
      </a>
      <a href="" @click.prevent="tabActive(5)" :class="(currentTab == 5)?'tab-active bg-active': ''"><img src="../assets/img/params_dashboard.svg">
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
      currentTab: 1,
  }
},
methods: {
  tabActive(tabActive) {
    this.currentTab = tabActive
    this.$emit('tab', tabActive)
  }
},
computed: {
  
},
}
</script>
<style>
.grey{
  filter: invert(96%) sepia(0%) saturate(1467%) hue-rotate(231deg) brightness(117%) contrast(77%);
}
.tab-active {
    align-items: center;
    background-color: var(--bleu);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    justify-content: center;
    padding: 10px 15px;
    position: relative;
    width: fit-content;}

.bg-active {
  background-color: #3F3FA6 !important;
}
.bg-active p{
  color: white !important;
  display: block !important
  ;
}
.bg-active img{
  filter: brightness(0) invert(1);
}
.svg{
  fill:  #3F3FA6;
}
</style>
