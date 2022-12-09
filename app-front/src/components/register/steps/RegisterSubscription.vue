<template>
  <div class="container-fluid m-0 p-0 bg-light">
    <NavbarConnected></NavbarConnected>
    <section style="overflow-x:hidden !important;">
      <h1 class="text-center my-5">Profitez de nos offres</h1>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow-x:hidden !important;">
        <div class="col-7 ml-auto mr-5 rounded">
          <div class="card p-0">
          <div class="card-header text-white text-center d-inline" style="background-color:#F37332;">
           <h3 class=""> Pour <h1>9.99 €</h1> seulement</h3>
          </div>
          <div class="card-body text-left ml-2 text-dark">
            <p style="color:#F37332;">Profitez de nombreux avantages :</p>
            <p>✓ Accès à un nombre illimité de profil</p>
            <p>✓ Présentation vidéo de votre projet</p>
            <p>✓ Description détaillé de votre projet</p>
            <p>✓ Demande d’amis illimité</p>
            <p>✓ Possibilité de voir les informations (téléphone, mail...) des associés</p>
            <p>✓ Recevez régulièrement des recommandations d’associés adapté à votre profil</p>
            <p>✓ Possibilité d’ajouter un autre projet à votre profil</p>
            <p>✓ Ajouter des informations supplémentaires à votre profil (vidéo présentation, portfolio, réseaux sociaux)</p>
          </div>
        </div>
      </div>    
      <div class="col-3 mr-auto">
        <a href="#" @click.prevent="subscribeUser()">
        <div class="card p-0">
          <div class="card-header text-white text-center" style="background-color:#3F3FA6;"><h3>
            Option à <h1>4.99 €</h1></h3>
          </div>
          <div class="card-body text-left mr-5 text-dark">
            <p>mise en avant sur la plateforme pendant 1 semaine. Cette option est renouvelable à l'infini.</p>
          </div>
          </div>
        </a>
          <router-link class="my-auto text-center text-light" to="/register/porteur"></router-link>
        </div>
      </div>
    </section>
    <Footer class="mt-5"></Footer>
  </div>
</template>
<script>
import NavbarConnected from '../NavbarConnected'
import Footer from '../../Footer.vue'

export default {
  name: 'RegisterSubscription',
  components: {NavbarConnected, Footer},
  methods: {
    getUserType() {
      let user = JSON.parse(localStorage.getItem("user"))
      console.log(user.user.user.id)
      console.log(user)
      return user.user.user.user_type;
    },
    subscribeUser(subType) {
      const self = this
      const userType = this.getUserType
      this.store.dispatch("subscribeUser", {
        subType: subType
      }).then(function (response) {
          if (response.status === 200 ) {
            if (userType === 1) {
              self.$router.push({path: '/searcher/home', replace: true})
            } else {
              self.$router.push({path: '/porteur/home', replace: true})
            }
          }
          console.log(response);
      });
    }
  },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
