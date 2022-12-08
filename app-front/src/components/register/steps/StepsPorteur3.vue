<template>
  <div>
      <div class="row">
        <h1 class="text-center mx-auto" style="margin-bottom: 40px; margin-top: 40px;">Alimentez votre profil</h1>
      </div>
      <div class="row" style="overflow:hidden;">
        <div class="offset-1 col-4" style="margin-top: 25px;">
          <b-form-group
            id="input-group-1"
            label-for="input-1"
          >
            <div class="row">
              <div class="col-10 mt-3">
                <b-form-input v-model="project" id="input-1" type="text" required placeholder="Nom de votre projet" @change="editAccount()"></b-form-input>
              </div>
            </div>
          </b-form-group>
          <div class="row" style="overflow-x: hidden;">
            <div class="col-12 mt-3">
                <textarea class="form-control" rows="14" placeholder="Description de votre projet (x caractères minimum)" @change="editAccount()" v-model="description"></textarea>
              </div>
          </div>
          <div class="row mt-3 ml-1">
            <b-form-group id="input-group-2" class="col-8 p-0">
              <select class="form-control form-select" aria-label="Default select example" v-model="field" @change="editAccount()">
                <option selected>Domaine d'activité (profils de chercheur)</option>
                <option value="field1">Domaine 1</option>
                <option value="field2">Domaine 2</option>
                <option value="field3">Domaine 3</option>
              </select>
            </b-form-group>
          </div>
          <div class="row ml-1">
            <b-form-group id="input-group-2" class="col-8 p-0">
              <select class="form-control form-select" aria-label="Default select example" v-model="skill" @change="editAccount()">
                <option selected>Compétences souhaitées</option>
                <option value="skill1">Competence 1</option>
                <option value="skill2">Competence 2</option>
                <option value="skill3">Competence 3</option>
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

/* eslint-disable */
  export default {
    name: 'StepsPorteur3',
    data() {
      return {
        project: "",
        field: "",
        skill: "",
        description: "",
        store
      };
    },
    computed: {
    },
    methods: { 
      getUserId() {
        let user = JSON.parse(localStorage.getItem("user"))
        console.log(user.user.user.id)
        console.log(user)
        return user.user.user.id;
      },
      editAccount() {
        this.$store.commit('storeProject', {
          project: {
            id: this.getUserId(),
            name: this.project,
            description: this.description, 
            skill: this.skill,
            field: this.field
          }
        });
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
