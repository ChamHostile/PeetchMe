<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <div class="container section-dashboard mt-5" style="overflow-x:hidden">
      <div class="col tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <div class="row mx-auto mb-2 shadow-sm bg-white p-4" style="border-radius: 20px !important;">
            <div class="userPerso col-4">
              <div class="row">
                <img src="../../assets/img/blondefemale.png" class="sm-img" style="border-radius: 50%; ">
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
          <div class="container row text-center">
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
                <p> {{ stringifySkills() }}</p>
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
                <p> {{  user.secteur }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import NavbarConnected from '../register/NavbarConnected.vue'
import Footer from '../Footer.vue'
import store from '../../store'

export default {
  name: 'DetailSearcherComponent',
  components: {NavbarConnected, Footer},
  data() {
    return {
      store,
      userId: this.$route.params.id,
      user: {},
      skills:  [],
      skillsId: []
    }
  },
  created() {
    let self = this
      this.store.dispatch("getUserFull", {
        id: self.userId
      }).then( (response) => {
          self.user = response.data.user
          var skills = response.data.skills
          for (var skill in skills) {
            let thisSkill = skills[skill].replace('/api', '')
            self.skillsId.push(thisSkill)
            self.store.dispatch("getSkill", {
              url: thisSkill
            }).then( (response) => {
              self.skills.push(response.data)
            })
          }
          self.user = response.data.user
        }) 
  }, methods: {
    stringifySkills() {
      let stringSkills = ""
      for (var skill in this.skills) {
        stringSkills = " "+ this.skills[skill].name
      }
      return stringSkills
    }
  },
  
}
</script>
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
  font-size: small;
}

.input{
  margin-top: 20px;
  background-color: white !important;
}
</style>