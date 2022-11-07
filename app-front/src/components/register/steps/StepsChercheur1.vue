<template>
<div>
    <div class="row">
      <h1 class="text-center mx-auto" style="margin-bottom: 100px; margin-top: 40px;">Inscription en tant que chercheur de projet</h1>
    </div>
    <div class="row" style="overflow-x: hidden;">
      <div class="offset-1 col-3" style="margin-top: 134px;">
        <b-form-group
          id="input-group-1"
          label-for="input-1"
        >
          <b-form-input v-model="email" id="input-1" type="email" required placeholder="E-mail"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2">
          <b-form-input id="input-2" required placeholder="Mot de passe"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2">
          <b-form-input id="input-2" required placeholder="Retapez votre mot de passe"></b-form-input>
        </b-form-group>
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
  name: 'StepsChercheur1',
  props: ['store'],
  data() {
    return {
      email: ""
    };
  },
  methods: {
    //nextStep() {
    /*if (this.email.length > 0) return true;

      this.$bvToast.toast(`El formluario tiene campos obligatorios`, {
        title: "Error",
        autoHideDelay: 2000,
        variant: "danger",
        toaster: "b-toaster-bottom-right"
      });
      this.$emit("error", true);
      return false;*/
    //}
  }
};
</script>

<style>
</style>
