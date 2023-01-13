<template>
  <div class="container-fluid m-0 p-0 bg-light">
    <NavbarConnected></NavbarConnected>
    <div class="container section-dashboard">
      <div class="d-flex align-items-start" style="margin-top: 133px;">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Profil</button>
          <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Bibliothèque</button>
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Message</button>
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Projet</button>
          <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Paramètres</button>
          <button class="nav-link logout">Déconnexion</button>
        </div>
        <div class="col tab-content shadow-sm" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row mx-auto mb-2 shadow-sm bg-white p-4" style="border-radius: 20px !important;">
              <div class="userPerso col-4">
                <div class="row">
                  <img src="../../assets/img/blondefemale.png" class="sm-img" style="border-radius: 50%; ">
                  <div class=" col-3">
                    <p class="font-weight-bold">{{user.prenom}}</p>
                    <p style="color:orange !important;"> {{ project.name }}</p>
                    <p class="text-muted">{{project.field}}</p>
                  </div>
                </div>
              </div>
              <div class="subscribe offset-4 col-3 d-flex align-items-center">
                <p>Porteur de projet</p>
                <p v-if="user.subscription_type == 2">Premium</p> 
                <p v-else></p>
              </div>
            </div> 
            <div class="container row text-center infos">
              <input type="text" disabled class="col-12 mx-auto input" placeholder="Présentation" :value="project.description">
              <input type="text" disabled class="col-6 mx-auto input mr-3" placeholder="Compétences" :value="stringifySkills()">
              <input type="text" disabled class="col-6 mx-auto input" placeholder="Soft skills">
              <input type="text" disabled class="col-6 mx-auto input mr-3" placeholder="Qualités">
              <input type="text" disabled class="col-6 mx-auto input" placeholder="Défaults" >
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
        </div>
      </div>
    </div>

    <Footer class="mt-5"></Footer>
  </div>
</template>
<script>
import NavbarConnected from '../register/NavbarConnected.vue'
import Footer from '../Footer.vue'
import store from '../../store'

export default {
  name: 'DetailProjectComponent',
  components: {NavbarConnected, Footer},
  data() {
    return {
      store,
      projectId: this.$route.params.id,
      project: {},
      user: {},
      skills:  [],
      skillsId: []
    }
  },
  created() {
    let self = this
      this.store.dispatch("getFullProject", {
        projectId: self.projectId
      }).then( (response) => {
          self.project = response.data.project
          var skills = response.data.project.skills
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
  background-color: #E2E2E2;
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

.input{
  margin-top: 20px;
  background-color: white !important;
}
</style>
