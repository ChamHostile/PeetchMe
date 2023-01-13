<template>
  <div>
      <div class="row">
        <h1 class="text-center mx-auto" style="margin-bottom: 40px; margin-top: 40px;">Alimentez votre profil</h1>
      </div>
      <div class="row" style="overflow-x: hidden;">
        <div class="offset-1 col-4" style="margin-top: 25px;">
        <p>Les essentiels</p>
          <b-form-group
            id="input-group-1"
            label-for="input-1"
          >
            <div class="row">
              <div class="col-6">
                <b-form-input v-model="nom" id="input-1" type="text" required placeholder="Nom" @change="editAccount()"></b-form-input>
              </div>
              <div class="col-6">
                <b-form-input v-model="prenom" id="input-1" type="text" required placeholder="Prenom" class="col" @change="editAccount()"></b-form-input>
              </div>
              <div class="col-6 mt-3">
                <b-form-input v-model="age" id="input-1" type="text" required placeholder="Age" class="col" @change="editAccount()"></b-form-input>
              </div>
              <div class="col-12 mt-3">
                <b-form-input v-model="address" id="input-1" type="text" required placeholder="Adresse Postale" @change="editAccount()"></b-form-input>
              </div>
              <div class="col-10 mt-3">
                <b-form-input id="input-1" type="text" required placeholder="Email (à divulguer aux contacts)" @change="editAccount()"></b-form-input>
              </div>
              <div class="col-10 mt-3">
                <b-form-input v-model="phone" id="input-1" type="tel" required placeholder="Tél +33" @change="editAccount()"></b-form-input>
              </div>
            </div>
          </b-form-group>
          <p class="mt-5 mb-4">Les infos clé</p>
          <div class="row">
            <b-form-group id="input-group-2" class="col-5 p-0">
              <select class="form-control form-select" aria-label="Default select example" @change="editAccount()">
                <option selected>Compétences</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
            <b-form-group id="input-group-2" class="col-5 p-0 ml-3">
              <select class="form-control form-select" aria-label="Default select example" @change="editAccount()">
                <option selected>Soft Skills</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
          </div>
          <div class="row">
            <b-form-group id="input-group-2" class="col-5 p-0">
              <select class="form-control form-select" aria-label="Default select example" @change="editAccount()">
                <option selected>Qualités</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
            <b-form-group id="input-group-2" class="col-5 p-0 ml-3">
              <select class="form-control form-select" aria-label="Default select example" @change="editAccount()">
                <option selected>Défauts</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
          </div>
          <div class="row">
            <b-form-group id="input-group-2" class="col-11 p-0">
              <input type="text" placeholder="Courte présentation" class="form-control" @change="editAccount()">
            </b-form-group>
            <b-form-group id="input-group-2" class="col-8 p-0">
              <select class="form-control form-select" aria-label="Default select example" @change="editAccount()">
                <option selected>Préférence domaine de projet</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
          </div>
        </div>
        <div class="d-none d-lg-block col text-right mr-0 p-0 registerImg">
          <img src="../../../assets/img/register_img.png"/>
        </div>
      </div>
    </div>
</template>

<script>
import store from '../../../store'

export default {
  name: 'StepsChercheur2',
  data () {
    return {
      nom: "",
      prenom: "",
      age: "",
      address: "",
      phone: "",
      store
    }
  },
  methods: {
    getUserId() {
      let user = JSON.parse(localStorage.getItem("user"))
      console.log(user.user.user.id)
      console.log(user)
      return user.user.user.id;
    },
    editAccount() {
      const self = this
      this.store.commit('storeAccount', {
        id: this.store.state.user.id,
        name: this.nom,
        firstname: this.prenom,
        phone: this.phone,
        address: this.address,
        age: this.age,
        type: 1
      })
    } 
  }
};
</script>

<style scoped>
  .registerImg::before{
    width: 100% !important;
    left: 160px;
  }
</style>
