<template>
<div class="container-fluid bg-dark" style="min-height: 100vh !important; overflow: hidden;">
    <div class="row"> 
      <div class="container col-6 text-white mt-5">
        <div class="text-center mb-5">  
          <img src="../../../assets/img/peetchme_white.svg" class="mx-auto d-block sm-img">
        </div>
        <div class="d-flex align-items-center mx-auto text-center">  
          <p class="text-sm col" style="color: #F37332">
          Bienvenue sur PeetchMe !
         </p> 
        </div>
        <div class="d-flex align-items-center mx-auto text-center">  
         <h3 class="text-white col mb-5">Inscrivez-vous gratuitement</h3>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <form class="w-60">
            <div class="row">
              <div class="col-6">
                <label>Prénom</label>
                <div class=" input-group mr-1 text-center">
                  <input type="text" class="form-control" placeholder="Votre prénom" v-model="prenom">
                </div>
              </div>
              <div class="col-6">
                <label>Nom</label>
                <div class=" input-group mr-1  text-center">
                  <input type="text" class="form-control" placeholder="Votre nom" v-model="nom">
                </div>
              </div>
            </div>
            <label>E-mail</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" placeholder="Entrez votre email" v-model="email">
            </div>
            <label>Mot de passe</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" placeholder="Tapez votre mot de passe" type="password" v-model="password">
            </div>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" placeholder="Retapez votre mot de passe" type="password">
            </div>
            <div class="">
              <button class="btn valider text-white form-control mt-4 rounded" @click="(prepareAccount())">Inscription</button>
            </div>

          </form>
        </div>
      </div>
      <div class="container text-center col-6"> 
        <img src="../../../assets/img/img_register.png" class="img-fluid">
      </div>
    </div>
  </div>

</template>

<script>
import store from '../../../store';
import { mapState } from 'vuex';

/* eslint-disable */
export default {
  name: 'RegistrationForm',
  data() {
    return {
      email: "",
      password: "",
      password2: "",
      nom:"",
      prenom:"",
      store
    };
  },
  computed: {
    passwordCompare() {
      console.log(this.password == this.password2)
      return this.password == this.password2 ? true : false
    },
    ...mapState(['userRegister'])
  },
  watch: {
    userRegister(newValue) {
      this.createAccount()
    }
  },
  methods: { 
    prepareAccount() {
        this.$store.commit('storeRegister', {
        email: this.email,
        password: this.password,
        name: this.nom,
        firstname: this.prenom
      })
    },
    createAccount() {
      const self = this
        this.store.dispatch('createAccount').then(function(response) { 
         self.store.dispatch("login", {
              username: self.email,
              password: self.password,
          }).then(function (response) {
            self.store.dispatch("loginToken", {}).then(function(rep) {
            console.log(rep);
            self.store.dispatch("userInfos").then(function (rep) {
                self.$router.push({name: 'RegisterPersonal'});
              }) 
            })
          })      
        })
    }
  }
}
</script>

<style scoped>
  input, select{
    border: 2px solid white !important;
    border-radius: 4px;
    color: white;
    background-color: #333333; 
    margin-bottom: 15px;
    margin-top: 15px;
  }
  img{
    margin: 10px;
  }
  .sm-img{
    width: 30% !important;
    height: 30% !important;
    margin-bottom: 90px !important;
}


  .valider{
    background-color: #3F3FA6 !important;
  }
</style>