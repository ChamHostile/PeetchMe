<template>

<div class="container-fluid bg-light">
    <div class="row">
      <div class="container col-6 text-dark mt-5">
        <div class="text-center mb-5">  
          <img src="../../../assets/img/Logo_web.png" class="mx-auto d-block sm-img">
        </div>
        <div class="d-flex align-items-center mx-auto text-center">  
          <p class="text-sm col" style="color: #F37332">
          Les infos clés
         </p> 
        </div>
        <div class="d-flex align-items-center mx-auto text-center">  
         <h3 class="text-dark col mb-5">Les essentiels</h3>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <form class="w-75">
            <label>Âge</label>
            <div class=" input-group mr-1  text-center">
              <select class="form-control p-1" v-model="age">
                <option value="" selected disabled>votre âge</option>
                <option value="18-25">18-25 ans</option>
                <option value="26-35">26-35 ans</option>
                <option value="36-50">36-50 ans</option>  
                <option value="50+">50 ans et plus</option>
              </select>
            </div>
            
            <label>Code Postal</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" placeholder="code postal" v-model="zip">
            </div>

            <label>Pays </label>
            <div class=" input-group mr-1  text-center">
              <select class="form-control p-1" v-model="country">
                <option value="" selected disabled>Pays de résidence</option>
                <option value="france">France</option>
                <option value="angleterre">Angleterre</option>
                <option value="allemagne">Allemagne</option>
              </select>
            </div>

            <label>Numéro de téléphone</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" placeholder="Votré numéro de téléphone (+33)" v-model="phone">
            </div>

            <div class="">
              <button class="btn valider text-white form-control mt-4 rounded" @click.prevent="editAccount()">Valider</button>
            </div>

          </form>
        </div>
      </div>
      <div class="container text-center col-6" style="height:100vh;"> 
        <img src="../../../assets/img/register_infos.png" class="img-fluid">
      </div>
    </div>
  </div>

</template>

<script>

import store from '../../../store';
import { mapState } from 'vuex';
/* eslint-disable */
export default {
  name: 'RegisterPersonal',
  data() {
    return {
      age: "",
      zip: "",
      country: "",
      phone: "",
      store
    };
  },
  computed: {
    ...mapState(['userInfos'])
  },
  watch: {
    userRegister(newValue) {
      this.editAction()
    }
  },
  methods: { 
    editAccount() {
      console.log("hello")
      this.store.commit('storeAccount', {
        id: this.store.state.user.id,
        age: this.age,
        country: this.country,
        phone: this.phone,
        zip: this.zip
      })
      if (this.store.state.userInfos.data !== undefined && this.store.state.userInfos.data.id) {
        const self = this
        this.store.dispatch("editAccount", {}).then(function (response) {
            if (response.status === 200 ) {
              self.$router.push({name: 'RegisterInfos'})
            }
            console.log(response);
        });
      }
    }
  }
};
</script>

<style scoped>
  input, select{
    border: 2px solid #333333 !important;
    border-radius: 4px;
    color: black;
    background-color: white; 
    margin-bottom: 15px;
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