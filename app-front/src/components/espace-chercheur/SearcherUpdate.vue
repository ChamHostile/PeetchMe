<template>
<div class="container-fluid bg-light" style="min-height: 100vh !important; overflow: hidden;">
    <div class="row"> 
      <div class="container text-dark mt-5">
        <div class="text-center mb-5">  
        </div>
        <div class="">  
          <h2 class="text-sm col" style="color: #F37332">
          Informations personnelles 
         </h2> 
         <p class="text-secondary"> Vous pouvez modifier vos informations personnelles</p>
        </div>

        <div class="d-flex align-items-center justify-content-center">
          <form class="w-60">
            <div class="row">
              <div class="col-6">
                <label>Prénom</label>
                <div class=" input-group mr-1 text-center">
                  <input type="text" class="form-control" placeholder="Votre prénom" v-model="prenom">
                </div>
              </div>
              <div class="col-6">
                <label>Nom</label>
                <div class=" input-group mr-1  text-center">
                  <input type="text" class="form-control" placeholder="Votre nom" v-model="nom">
                </div>
              </div>
            </div>
            <label>E-mail</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" placeholder="Entrez votre email" v-model="email">
            </div>
            <label>Mot de passe</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="password" v-model="password">
            </div>
            <label>Age</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" v-model="age">
            </div>
            <label>Code Postal</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" v-model="zip">
            </div>
            <label>Pays</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" v-model="country">
            </div>
            <label>Numéro de téléphone</label>
            <div class=" input-group mr-1  text-center">
              <input class="form-control" type="text" v-model="phone">
            </div>
            <div class="">
              <button class="btn valider text-white form-control mt-4 rounded" @click.prevent="(editUser())">Modifier</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import store from '../../store';
import { mapState } from 'vuex';

/* eslint-disable */
export default {
  name: 'SearcherUpdate',
  data() {
    return {
      email: "",
      password: "",
      nom:"",
      prenom:"",
      age: "",
      zip: "",
      country: "",
      phone: "",
      userId: JSON.parse(localStorage.getItem("user")), 
      store
    };
  },
  created() {
    let self = this
    
      this.store.dispatch("getUserFull", {
        id: self.userId.id
      }).then( (response) => {
        self.email = response.data.email,
        self.nom = response.data.user.nom,
        self.prenom = response.data.user.prenom,
        self.age = response.data.user.age,
        self.zip = response.data.user.zip,
        self.country = response.data.address.country,
        self.phone = response.data.user.telephone
      })
  },
  methods: { 
    prepareData() {
      self = this
     let data = {}
     data.id = self.userId.id
     if (this.email && this.email.length > 0) data.email = self.email
     if (this.nom && this.nom.length > 0) data.name = this.nom
     if (this.prenom && this.prenom.length > 0) data.firstname = this.prenom
     if (this.age && this.age.length > 0) data.age = this.age
     if (this.zip && this.zip.length > 0) data.zip = this.zip
     if (this.country && this.country.length > 0) data.country = this.country
     if (this.phone && this.phone.length > 0) data.phone = this.phone

     return data;
    },  
    editUser() {
      const self = this
      var data = this.prepareData();
      this.store.dispatch("editDashboard", { data
      }).then( (response) => {
        self.email = response.data.email,
        self.nom = response.data.user.nom,
        self.prenom = response.data.user.prenom,
        self.age = response.data.user.age,
        self.zip = response.data.user.zip,
        self.country = response.data.address.country,
        self.phone = response.data.user.telephone
      })
    }
  }
}
</script>

<style scoped>
  input, select{
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