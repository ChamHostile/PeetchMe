<template>
<div class="my-4 container-fluid bg-light">
    <div class="row">
      <h1 class="text-center mx-auto" style="margin-bottom: 100px; margin-top: 40px;">Inscription en tant que chercheur de projet</h1>
    </div>
    <div class="row" style="overflow-x: hidden;">
      <div class="offset-1 col-3" style="margin-top: 134px;">
        <b-form-group
          id="input-group-1"
          label-for="input-1"
        >
          <b-form-input v-model="email" id="input-1" type="email" required placeholder="E-mail" ref="email" @change="prepareAccount()"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2">
          <b-form-input type="password" id="input-2" v-model="password" required placeholder="Mot de passe" ref="mdp" @change="prepareAccount()"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2">
          <b-form-input id="input-2" required placeholder="Retapez votre mot de passe" v-model="password2" ref="mdp2" @change="prepareAccount()" type="password"></b-form-input>
        </b-form-group>
      </div>
      <div class="d-none d-lg-block col text-right mr-0 p-0 registerImg">
        <img src="../../../assets/img/register_img.png"/>
      </div>
    </div>
  </div>
</template>

<script>
import store from '../../../store'

if (localStorage.getItem('reloaded')) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem('reloaded');
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem('reloaded', '1');
      location.reload();
  }

/* eslint-disable */
export default {
  name: 'StepsChercheur1',
  data() {
    return {
      email: "",
      password: "",
      password2: "",
      store
    };
  },
  computed: {
    passwordCompare() {
      return this.password = this.password2 ? true : false
    }
  },
  methods: { 
    prepareAccount() {
      this.$store.commit('storeRegister', {
        email: this.email,
        password: this.password,
        type: 1
      });
    }
  }
};
</script>

<style>
</style>
