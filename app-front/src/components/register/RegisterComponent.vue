<template>
<div class="container-fluid m-0 p-0 bg-light">
    <NavbarRegister></NavbarRegister>
    <section id="profile">
      <h1 class="text-center my-5 title-profile">Votre profil</h1>
      <div class="row text-center">
        <div class="col-4 d-flex aligns-items-center justify-content-center chercheur ml-auto mr-5 rounded" id="chercheur">
          <a class="my-auto text-center text-light" href="#/register/searcher">Chercheur de projet</a>
        </div>
        <div class="col-4 d-flex aligns-items-center justify-content-center porteur mr-auto ml-5 rounded" id="porteur">
          <a class="my-auto text-center text-light" href="#/register/porteur">Porteur de projet</a>
        </div>
      </div>
    </section>
</div>
</template>

<script>
import NavbarRegister from './NavbarRegister'
export default {
  name: 'RegisterComponent',
  components: {NavbarRegister},
  data () {
    return {
      
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import '../../assets/css/registration.css';

</style>
