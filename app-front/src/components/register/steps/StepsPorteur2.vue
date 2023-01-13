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
        <b-form-input v-model="age" id="input-1" type="number" required placeholder="Age" class="col" @change="editAccount()"></b-form-input>
      </div>
      <div class="col-12 mt-3">
        <b-form-input v-model="address" id="input-1" type="text" required placeholder="Adresse Postale" @change="editAccount()"></b-form-input>
      </div>
      <div class="col-10 mt-3">
        <b-form-input v-model="prenom" id="input-1" type="text" required placeholder="Email (à divulguer aux contacts)" @change="editAccount()"></b-form-input>
      </div>
      <div class="col-10 mt-3">
        <b-form-input v-model="telephone" id="input-1" type="tel" required placeholder="Tél +33" @change="editAccount()"></b-form-input>
      </div>
    </div>
      </b-form-group>
      <p class="mt-5 mb-4">Les infos clé</p>
      <div class="row">
        <b-form-group id="input-group-2" class="col-5 p-0">
          <select class="form-control form-select" aria-label="Default select example" v-model="skill1" @change="editAccount()">
            <option selected>Compétences</option>
            <option value="skill1">Compétence 1</option>
            <option value="skill2">Compétence 2</option>
            <option value="skill3">Compétence 3</option>
          </select>
        </b-form-group>
        <b-form-group id="input-group-2" class="col-5 p-0 ml-3">
          <select class="form-control form-select" aria-label="Default select example" v-model="skill2" @change="editAccount()">
            <option selected>Soft Skills</option>
            <option value="softskill1">Soft Skill 1</option>
            <option value="softskill2">Soft Skill 2</option>
            <option value="softskill3">Soft Skill 3</option>
          </select>
        </b-form-group>
      </div>
      <div class="row">
        <b-form-group id="input-group-2" class="col-5 p-0">
          <select class="form-control form-select" aria-label="Default select example" v-model="skill3" @change="editAccount()">
            <option selected>Qualités</option>
            <option value="qualite1">Qualité 1</option>
            <option value="qualite2">Qualité 2</option>
            <option value="qualite3">Qualité 3</option>
          </select>
        </b-form-group>
        <b-form-group id="input-group-2" class="col-5 p-0 ml-3">
          <select class="form-control form-select" aria-label="Default select example" v-model="skill4" @change="editAccount()">
            <option selected>Défauts</option>
            <option value="defaut1">Défaut 1</option>
            <option value="defaut2">Défaut 2</option>
            <option value="defaut3">Défaut 3</option>
          </select>
        </b-form-group>
      </div>
      <div class="row">
        <b-form-group id="input-group-2" class="col-11 p-0">
          <input type="text" placeholder="Courte présentation" class="form-control" v-model="description" @change="editAccount()">
        </b-form-group>
        <b-form-group id="input-group-2" class="col-8 p-0">
          <select class="form-control form-select" aria-label="Default select example" v-model="preference" @change="editAccount()">
            <option selected>Préférence (profils de chercheur)</option>
            <option value="type1">Type 1</option>
            <option value="type2">Type 2</option>
            <option value="type3">Type 3</option>
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
/* eslint-disable */
import store from '../../../store';

export default {
  name: 'StepsPorteur2',
  data() {
    return {
      nom: "",
      prenom: "",
      age: "",
      address: "",
      telephone: "",
      skill1: "",
      skill2: "",
      skill3: "",
      skill4: "",
      description: "",
      preference: "",
      store
    }
  },
  methods: {
    getUserId() {
      let user = JSON.parse(localStorage.getItem("user"))
      return user.user.user.id;
    },
    editAccount() {
      this.store.commit('storeAccount', {
        id: this.store.state.user.id,
        name: this.nom,
        firstname: this.prenom,
        phone: this.telephone,
        age: this.age,
        address: this.address,
        phone: this.telephone,
        skill: {
          skill1: this.skill1,
          skill2: this.skill2,
          skill3: this.skill3,
          skill4: this.skill4
        },
        description: this.description,
        preference: this.preference,
        userType: 2
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
