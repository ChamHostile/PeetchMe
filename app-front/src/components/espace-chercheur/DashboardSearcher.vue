<template>
  <div class="container-fluid m-0 p-0 bg-light">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11">
    <div class="container section-dashboard">

    <DahsboardMenu class="text-center" @tab="getTab"></DahsboardMenu>
    
      <div class="d-flex justify-content-end" v-if="tabNum == 1">
        <a href="" @click.prevent="modeEdit()" style="text-decoration: none; color:#9F9F9F;" v-if="edit == 0"><img src="../../assets/img/modifier.svg">  Modifier</a>
        <div v-else>
          <a href="" @click.prevent="cancelEdit()" class="btn btn-secondary text-white" style="text-decoration: none;"><img src="../../assets/img/cancel.svg">  Annuler</a>
          <a href="" @click.prevent="editAccount()" class="btn btn-primary text-white" style="text-decoration: none;"><img src="../../assets/img/confirm.svg">  Sauvegarder</a>
        </div>
      </div>
      <div class="d-flex align-items-start mt-4">
        <div class="col tab-content" id="v-pills-tabContent" v-if="tabNum == 1">
          <div class="show active">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4" style="border-radius: 20px !important;">
              <div class="userPerso col-4">
                <div class="row">
                  <div class="col-8">
                  <img src="../../assets/img/blondefemale.png" class="sm-img" style="border-radius: 50%; ">
                  </div>
                  <div class=" col-3">
                    <p class="font-weight-bold">{{user.prenom}}</p>
                    <p style="color:orange !important;">Metier</p>
                    <p class="text-muted">Localisation Non renseignée</p>
                  </div>
                </div>
              </div>
              <div class="subscribe offset-4 col-3 d-flex align-items-center">
              <div v-if="!user.user_type">
                <p class="font-weight-bold" style="color: #F37332;">
                  Etes-vous porteur ou chercheur de projet ?
                </p>
                <button @click.prevent="selectType()" class="btn btn-primary">
                  Choisir votre profil
                </button>
              </div>
              <div v-else>
                <p class="font-weight-bold" style="color: #F37332;">
                  {{userType}}
                </p>
              </div>
                <p v-if="user.subscription_type == 2">Premium</p> 
                <p v-else></p>
              </div>
              <div class="row" v-if="choseType">
                  <div class="col-6 p-5">
                    <p>Vous êtes</p>
                    <h2 class="text-white">porteur de projet ?</h2>
                    <p>Profitez de la plateforme pour déposez votre pitch de présentation de projet et sélectionnez vos profils d’associés coup de cœur parmi une liste en un seul clic.</p>
                    <button class="btn btn-primary p-2" @click.prevent="setUserType(2)">Je suis porteur de projet</button>
                  </div>
                  <div class="col-6 p-5">
                    <p>Vous êtes</p>
                    <h2 class="text-white">chercheur de projet ?</h2>
                    <p>Vous visionnez les pitchs et entrez directement en contact avec le porteur du projet qui vous intéresse.</p>
                    <button class="btn btn-primary p-2 text-white" @click.prevent="setUserType(1)">Je suis chercheur de projet</button>
                  </div>
                </div>
            </div> 
            <div class="row text-center">
              <div class="col-6">
                <div v-if="edit==0">
                  <p class="text-center">
                    Description
                  </p>
                  <p> {{  user.description }}</p>
                </div>
                <div v-else>
                  <input type="text" v-model="userDescription">
                </div>
                <div v-if="edit==0">
                  <p class="text-center">
                    Compétences
                  </p>
                  <section class="skills">
                    <p class="badg" v-for="skill in currentUser.user.skill"> {{  skill.name }}</p>
                  </section>                
                </div>
                <div v-else>
                  <ejs-multiselect id='multiselect' :dataSource='skillsList' :fields='fields' placeholder="Ajoutez vos compétences" mode="CheckBox" class="form-control text-center" v-model="skills"></ejs-multiselect>
                </div>
                <div v-if="edit==0">
                  <p class="text-center">
                    Soft Skills
                  </p>
                  <section class="skills">
                    <p class="badg" v-for="skill in currentUser.user.skill"> {{  skill.name }}</p>
                  </section>
                  </div>
                <div v-else>
                  <ejs-multiselect id='multiselect' :dataSource='skillsList' :fields='fields' placeholder="Ajoutez vos soft skills" mode="CheckBox" class="form-control text-center" v-model="softSkills"></ejs-multiselect>   
                </div>
              </div>

              <div class="col-6">
                <div v-if="edit==0">
                  <p class="text-center">
                    Experience
                  </p>
                  <p> {{  user.experience }}</p>
                </div>  
                <div v-else>
                  <input type="text">
                </div>
                <div v-if="edit==0">
                  <p class="text-center">
                    Secteur d'activité
                  </p> 
                  <section class="skills">
                    <p class="badg" v-for="field in currentUser.user.field"> {{  field.name }}</p>
                  </section>
                </div>
                <div v-else>
                  <ejs-multiselect id='multiselect' :dataSource='fieldList' :fields='fields' placeholder="Votre/Vos secteur(s) d'activité" mode="CheckBox" class="form-control text-center" v-model="secteurs"></ejs-multiselect>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col tab-content savedProjects" id="v-pills-tabContent" v-if="tabNum == 2">
          <div class="show active">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4 text-center" style="border-radius: 20px !important;">
              <p>Aucun projets enregistrés</p>
            </div> 
          </div>
        </div>

        <div class="col tab-content savedProjects" id="v-pills-tabContent" v-if="tabNum == 3">
          <div class="show active">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4 text-center" style="border-radius: 20px !important;">
              <p>Compléter votre profil à 100% pour pouvoir intéragir avec la communité  PeetchMe</p>
            </div> 
          </div>
        </div>

        <div class="col tab-content savedProjects" id="v-pills-tabContent" v-if="tabNum == 4">
          <div class="show active">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4 text-center" style="border-radius: 20px !important;">
              <p>Compléter votre profil à 100% et choisissez votre statut afin d’accéder à nos offres</p>
            </div> 
          </div>
        </div>

        <div class="col tab-content savedProjects" id="v-pills-tabContent" v-if="tabNum == 5">
          <div class="show active">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4 text-center" style="border-radius: 20px !important;">
              <SearcherUpdateComponent></SearcherUpdateComponent>
            </div> 
          </div>
        </div>



      </div>
    </div>
</div>
</div>
    <Footer class="mt-5"></Footer>
  </div>
</template>
<script>
import NavbarConnected from '../register/NavbarConnected.vue'
import Footer from '../Footer.vue'
import SideBarComponent from '../SideBarComponent.vue'
import DahsboardMenu from '../DahsboardMenu.vue'
import store from '../../store'
import SearcherUpdateComponent from './SearcherUpdate'

// console.log(JSON.parse(localStorage.getItem("user")).user.user)
export default {
  name: 'DashboardSearcher',
  components: {NavbarConnected, Footer, SideBarComponent, DahsboardMenu, SearcherUpdateComponent},
  data() {
    return {
      store,
      currentUser: JSON.parse(localStorage.getItem("user")),
      user: {},
      tabNum: 1,
      edit: 0,
      choseType: 0,
      userDescription: '',
      userExp: '',
      userSkill: "",
      userField: "",
      userSoftskills: "",
      tabClass: "tabActive",
      skillsList: [
        {id: 'skill1', name: 'Skill1'},
        {id: 'skill2', name: 'Skill2'},
        {id: 'skill3', name: 'Skill3'},
        {id: 'skill4', name: 'Skill4'},
      ],
      fieldList: [
        {id: 'fieldlist1', name: 'Domaine 1'},
        {id: 'fieldlist2', name: 'Domaine 2'},
        {id: 'fieldlist3', name: 'Domaine 3'},
        {id: 'fieldlist4', name: 'Domaine 4'},
      ],
      fields: {text: 'name', value:'id'},
      skills: [],
      softSkills: [],
      secteurs: []
    }
  },
  beforeMount() {
    let self = this
    console.log(this.currentUser)
    this.store.dispatch("getUserFull", {
      id: this.currentUser.user.user.id
    }).then( (response) => {
        self.user = response.data.user
        console.log(self.user)
    })
  },
  methods: {
    getTab(value) {
      console.log(value)
      return this.tabNum = value
    },
    changeTab(tabNum) {
      return this.tabNum = tabNum;
    },
    modeEdit() {
      console.log(this.edit)
      if (this.edit !== 1) {
        return this.edit = 1
      }
    },
    editAccount() {
      const self = this
      this.store.dispatch("editDashboard", {
        id: this.user.id,
        skills: this.skills,
        softSkills: this.softSkills,
        secteurs: this.secteurs,
        description: this.description
      }).then(function (response) {
        console.log(response)
        if (response.status === 200 ) {
          self.$router.go()
        }  
      });
    },
    cancelEdit() {
      console.log(this.edit)
      if (this.edit !== 0) {
        return this.edit = 0
      }
    },
    selectType() {
      console.log(this.choseType)
      if (this.choseType !== 1) {
        return this.choseType = 1
      }
    },
    editData() {

    },
    setUserType(type) {
      const self = this
      console.log(this.user)
      console.log(this.user.id)
      this.store.dispatch("setUserType", {
        id: this.user.id,
        type: type
      }).then(function (response) {
        console.log(response)
        if (response.status === 200 ) {
          self.$router.go()
        }  
      });
    }
  },
  computed: {
    userType() {
      return this.user.user_type == 1 ? "Chercheur" : "Porteur de projet" 
    }
  },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.nav-link{
  background-color: #E2E2E2 !important;
  text-align: left !important;
  margin-top: 3px !important;
}
.nav-link .active{
  background-color: #3F3FA6 !important;
}

.skills{
  align-items: center;
    align-self: stretch;
    display: flex;
    gap: 10px;
    justify-content: center;
    position: relative;
    box-shadow: 0px !important;
    padding-top: 4px !important;
    padding-bottom: 12px !important;
    margin-top: 20px !important;
    border: 0px ;
}

.badg{
  align-items: center;
  background-color: lightgrey;
  color:black !important;
  border-radius: 5px;
  display: flex;
  gap: 10px;
  padding: 0px 10px;
  width: fit-content;
}

.section-dashboard{
  min-height: calc(100vh - 224px);
}
.infos{
  background-color: #3F3FA6;
  padding-top: 45px;
  padding-bottom: 45px;
  padding-left: 80px;
  padding-right: 80px;
}
.infos input{
  height: 116px;
  border-radius: 15px;
  text-align: center; 
}

.col-6 div {
  padding-top: 4px;
  padding-bottom: 12px;

  background: white;
  border-radius: 20px !important;
  margin-top: 20px;
  box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%) !important;
}

.col-6 div input {
  border: 0px;
}

.col-6 div p{
  color: #9F9F9F;
  height: 16px;
}

.input{
  margin-top: 20px;
  background-color: white !important;
}
a:hover{
  text-decoration: none;
}
a:active{
  text-decoration:none; 
}
</style>
