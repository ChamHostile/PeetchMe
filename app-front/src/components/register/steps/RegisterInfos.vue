<template>

  <div class="container-fluid bg-light" style="height: 100vh;">
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
         <h3 class="text-dark col mb-5">Alimentez votre profil</h3>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <form class="w-75">
            <label>Localisation</label>
            <div class=" input-group mr-1  text-center">
              <select class="form-control p-1" v-model="localization">
                <option value="" selected disabled>Votre localisation</option>
                <option value="paris">Paris</option>
                <option value="marseille">Marseille</option>
                <option value="toulouse">Toulouse</option>
                <option value="strasbourg">Strasbourg</option>
              </select>
            </div>
            <label>Compétences</label>
            <div class=" input-group mr-1  text-center">
              <ejs-multiselect id='multiselect' :dataSource='skillsList' :fields='fields' placeholder="Ajoutez vos compétences" mode="CheckBox" class="form-control text-center" v-model="skills"></ejs-multiselect>            
            </div>
            <label>Soft Skills</label>
            <div class=" input-group mr-1  text-center">
              <ejs-multiselect id='multiselect' :dataSource='skillsList' :fields='fields' placeholder="Ajoutez vos soft skills" mode="CheckBox" class="form-control text-center" v-model="softSkills"></ejs-multiselect>            
            </div>
            <label>Expérience</label>
            <div class=" input-group mr-1  text-center">
              <select class="form-control p-1" v-model="experience">
                <option value="" selected disabled>Votre expérience entrepreunariale</option>
                <option value="fictif">Projet fictif</option>
                <option value="projet">Participation à un projet</option>
                <option value="entamme">Projet entammé mais non abouti</option>
                <option value="lance">Projet lancé et fonctionnel</option>
              </select>
            </div>
            <label>Secteur d'activité</label>
            <div class=" input-group mr-1  text-center">
              <ejs-multiselect id='multiselect' :dataSource='skillsList' :fields='fields' placeholder="Votre/Vos secteur(s) d'activité" mode="CheckBox" class="form-control text-center" v-model="secteurs"></ejs-multiselect>
            </div>
            <label>Description</label>
            <div class=" input-group mr-1  text-center">
              <input type="text" placeholder="Décrivez-vous en quelques mots"  class="form-control" v-model="description">
            </div>
            <div class="">
              <button class="btn valider text-white form-control mt-4 col-9" @click.prevent="(editAccount())">Valider</button> <a style="color: black !important; text-decoration: none; font-size: 12px;" @click="nextPage()">
              Remplir plus tard</a>
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
  name: 'RegisterInfos',
  data() {
    return {
      skillsList: [
        {id: 'skill1', name: 'Skill1'}, 
        {id: 'skill2', name: 'Skill2'},
        {id: 'skill3', name: 'Skill3'},
        {id: 'skill4', name: 'Skill4'},
      ],
      fields: {text: 'name', value:'id'},
      skills: [],
      softSkills: [],
      secteurs: [],
      localization: "",
      experience: "",
      description: "",
      store,
      currentUser: JSON.parse(localStorage.getItem("user")),
    };
  },
  computed: {
    passwordCompare() {
      console.log(this.password == this.password2)
      return this.password == this.password2 ? true : false
    },
    ...mapState(['userInfos'])
  },
  watch: {
    userInfos(newValue) {
      this.editAction()
    }
  },  
  methods: { 
    editAccount() {
      this.store.commit('storeAccount', {
        id: this.currentUser.user.user.id,
        skills: this.skills,
        softSkills: this.softSkills,
        secteurs: this.secteurs,
        localization: this.localization,
        experience: this.experience,
        description: this.description
      })

      console.log(this.store.state.userInfos.data.id)

      if (this.store.state.userInfos.data !== undefined && this.store.state.userInfos.data.id) {
        const self = this
        this.store.dispatch("editAccount", {}).then(function (response) {
            if (response.status === 200 ) {
              self.$router.replace({path: '/searcher/home'})
            }
            console.log(response);
        });
      }
    }
  }
}
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