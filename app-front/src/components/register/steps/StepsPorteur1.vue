<template>
  <div>
      <div class="row">
        <h1 class="text-center mx-auto" style="margin-bottom: 100px; margin-top: 40px;">Inscription en tant que porteur de projet</h1>
      </div>
      <div class="row" style="overflow-x: hidden;">
        <div class="offset-1 col-3" style="margin-top: 134px;">
          <b-form-group
            id="input-group-1"
            label-for="input-1"
          >
            <b-form-input v-model="email" id="input-1" type="email" required placeholder="E-mail" @change="prepareAccount()"></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2">
            <b-form-input id="input-2" type="password" required placeholder="Mot de passe" @change="prepareAccount()" v-model="password"></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2">
            <b-form-input id="input-2" required placeholder="Retapez votre mot de passe" @change="prepareAccount()" v-model="password2" type="password"></b-form-input>
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

/* eslint-disable */
  export default {
    name: 'StepsPorteur1',
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
      },
      fieldValidated() {
        return this.email != "" && this.password != "" && this.passwordCompare ? true : false
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
  