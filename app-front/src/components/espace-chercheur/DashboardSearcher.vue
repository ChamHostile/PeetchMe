<template>
  <div class="container-fluid m-0 p-0 bg-light">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11">
    <div class="container section-dashboard">

    <DahsboardMenu class="text-center" @tab="getTab"></DahsboardMenu>
    
      <div class="d-flex justify-content-end">
        <a href="#" style="text-decoration: none; color:#9F9F9F;"><img src="../../assets/img/modifier.svg">  Modifier</a>
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
                <p>Chercheur de projet</p>
                <p v-if="user.subscription_type == 2">Premium</p> 
                <p v-else></p>
              </div>
            </div> 
            <div class="row text-center">
              <div class="col-6">
                <div>
                  <p class="text-center">
                    Description
                  </p>
                  <p> {{  user.description }}</p>
                </div>
                <div>
                  <p class="text-center">
                    Compétences
                  </p>
                  <p> {{  user.skills }}</p>
                </div>
                <div>
                  <p class="text-center">
                    Soft Skills
                  </p>
                  <p> {{  user.description }}</p>
                </div>
    
              </div>

              <div class="col-6">
                <div>
                  <p class="text-center">
                    Experience
                  </p>
                  <p> {{  user.experience }}</p>
                </div>  
                <div>
                  <p class="text-center">
                    Secteur d'activité
                  </p>
                  <p> {{ user.secteur }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col tab-content" id="v-pills-tabContent" v-if="tabNum == 2">
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
                <p>Chercheur de projet</p>
                <p v-if="user.subscription_type == 2">Premium</p> 
                <p v-else></p>
              </div>
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

// console.log(JSON.parse(localStorage.getItem("user")).user.user)
export default {
  name: 'DashboardSearcher',
  components: {NavbarConnected, Footer, SideBarComponent, DahsboardMenu},
  data() {
    return {
      user: JSON.parse(localStorage.getItem("user")),
      tabNum: 1,
      edit: 0,
      userDescription: "",
      userExp: "",
      skills: "",
      secteur: "",
      softskills: "",
      tabClass: "tabActive"
    }
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
      if (this.edit !== 1) {
        return this.edit = 1
      }
    },
    editData() {

    },
    setUserType() {

    }
  },
  computed: {
    
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
