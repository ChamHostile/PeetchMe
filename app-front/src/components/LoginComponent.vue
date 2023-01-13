<template>
  <div class="mb-4 container-fluid bg-light">
    <NavbarConnected class="mb-5"></NavbarConnected>
      <div class="row">
        <h1 class="text-center mx-auto" style="margin-bottom: 100px; margin-top: 40px;">Connexion</h1>
      </div>
      <div class="row" style="overflow-x: hidden;">
        <div class="offset-1 col-3" style="margin-top: 134px;">
          <b-form-group
            id="input-group-1"
            label-for="input-1"
          >
            <b-form-input v-model="email" id="input-1" type="email" required placeholder="E-mail" ref="email"></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2">
            <b-form-input id="input-2" v-model="password" required placeholder="Mot de passe" ref="mdp" type="password"></b-form-input>
          </b-form-group>

          <button class="btn btn-primary" @click.prevent="login()">Se connecter</button>

        </div>
        <div class="d-none d-lg-block col text-right mr-0 p-0 registerImg">
          <img src="../assets/img/register_img.png"/>
        </div>
      </div>
    </div>
</template>

<script>
import store from '../store'
import NavbarConnected from './register/NavbarConnected.vue'

/* eslint-disable */
export default {
    name: "LoginComponent",
    data() {
        return {
            email: "",
            password: "",
            password2: "",
            store
        };
    },
    methods: {
      login() {
          const self = this
          this.store.dispatch("login", {
              username: this.email,
              password: this.password,
          }).then(function (response) {
            self.store.dispatch("loginToken", {
          }).then(function (rep) {
            console.log(rep);
            self.store.dispatch("userInfos", {
            }).then(function(r) {
              if (r.data.user_type === 1 ) {
                self.$router.push({path: '/searcher/home', replace: true})
              } else {
                self.$router.push({path: '/porteur/home', replace: true})
              }
            })
          })
              
          });
      }
    },
    components: { NavbarConnected }
};
</script>

<style>
.d-stepper .d-stepper-header {
  margin: 0 auto;
  position: relative;
}

.d-stepper .d-stepper-header::before {
  position: absolute;
  width: 100%;
  height: 1px;
  background: #DDD;
  top: 20px;
  left: 0;
  content: " ";
}
.bg-orange{
  background: #F37332 !important;
  color: white !important;
}

.d-stepper .step-number {
  background: #333333;
  border-radius: 50%;
  text-align: center;
  height: 40px;
  width: 40px;
  display: flex;
  color: white;
}
.d-stepper .step-number-content {
  transition: transform 0.2s;
  z-index: 2;
  width: 68px;
}

.d-stepper .step-number-content div {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
.d-stepper .step-number-content.active {
  transform: scale(1.25);
}

.in-out-translate-fade-enter-active,
.in-out-translate-fade-leave-active {
  transition: all 0.15s;
}
.in-out-translate-fade-enter,
.in-out-translate-fade-leave-active {
  opacity: 0;
}
.in-out-translate-fade-enter {
  transform: translateX(100px);
}
.in-out-translate-fade-leave-active {
  transform: translateX(-100px);
}

.out-in-translate-fade-enter-active,
.out-in-translate-fade-leave-active {
  transition: all 0.15s;
}
.out-in-translate-fade-enter,
.out-in-translate-fade-leave-active {
  opacity: 0;
}
.out-in-translate-fade-enter {
  transform: translateX(-100px);
}
.out-in-translate-fade-leave-active {
  transform: translateX(100px);
}
.registerImg img{
    position: relative;
    z-index: 999;
}
.registerImg::before{
    position: absolute;
    background-image: url('../assets/img/orange_register.svg');
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    content: '';
    bottom: 5px;
    left: 290px;
    overflow-x: hidden;
}
</style>
