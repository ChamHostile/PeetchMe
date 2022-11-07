<template>
  <div>
      <div class="row">
        <h1 class="text-center mx-auto" style="margin-bottom: 100px; margin-top: 40px;">Vérification de votre identité</h1>
      </div>
      <div class="row" style="overflow-x:hidden;">
        <h5 class="col-12 ml-5 font-weight-normal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16" style="color: #3F3FA6;">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg> Carte d'identité, passeport, ou permis de conduire</h5>
      </div>
      <div class="row" style="overflow-x: hidden;">
        <div class="col-4 mt-5 ml-5">
          <div class="drag-image d-flex flex-column align-items-center justify-content-center">
            <div class="icon"><img src="../../../assets/img/upload_file.svg"/></div>
            <p class="text-secondary mt-4">Importez ou faites glisser votre document</p>
            <input type="file" hidden>
          </div>
        </div>

        <div class="d-none d-lg-block col-lg text-right mr-0 p-0 registerImg">
          <img src="../../../assets/img/register_img.png"/>
        </div>
      </div>
      <b-button size="md" class="button-blue"><router-link to="/register/subscription" class="text-light">Valider</router-link></b-button>
    </div>
  </template>

<script>
/* eslint-disable */

export default {
  name: 'StepsPorteur4',
  props: ['store']
};
</script>

<style scoped>
.drag-image{
  height: 394px !important;
  width: 608px !important;
  background-color: #F5F5F5;
}
.registerImg::before{
    width: 100% !important;
    left: 244px;
  }
.valider-register-porteur{
  display: none !important;
}
</style>
