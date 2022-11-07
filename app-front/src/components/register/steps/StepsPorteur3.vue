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
                <b-form-input v-model="project" id="input-1" type="text" required placeholder="Nom de votre projet"></b-form-input>
              </div>
            </div>
          </b-form-group>
          <div class="row" style="overflow-x: hidden;">
            <div class="col-12 mt-3">
                <textarea class="form-control" rows="14" placeholder="Description de votre projet (x caractères minimum)"></textarea>
              </div>
          </div>
          <div class="row mt-3 ml-1">
            <b-form-group id="input-group-2" class="col-8 p-0">
              <select class="form-control form-select" aria-label="Default select example">
                <option selected>Domaine d'activité (profils de chercheur)</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </b-form-group>
          </div>
          <div class="row ml-1">
            <b-form-group id="input-group-2" class="col-8 p-0">
              <select class="form-control form-select" aria-label="Default select example">
                <option selected>Compétences souhaitées</option>
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
/* eslint-disable */

export default {
  name: 'StepsPorteur3',
  props: ['store'],
  methods: {
    //nextStep() {
    /*this.$emit("loading", true);
      setTimeout(() => {
        this.$emit("can-continue");
        //this.$emit("fatal-error", "Erreur s'est produite");
      }, 2000);*/
    //}
  }
};
</script>

<style scoped>
.registerImg::before{
    width: 100% !important;
    left: 160px;
  }
</style>
