<template>

  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>

    <div class="container section-dashboard mt-5" style="overflow-x:hidden">
      
      <div class="col p-3" id="v-pills-tabContent" style="background-color: #F4F4FF;">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="row">
          <div class="col-4">
            <img src="../../assets/img/project.png" class="img-rounded" style="height:100%; width:100%" alt="...">
          </div>
          <div class="col-8">
            <div class="row">
              <h2 class="col-3" style="color: #F37332;">{{ project.name }}</h2>
              <div class="offset-6 col-3 d-flex justify-content-end" v-if="currentUser.user.id != user.id">
                  <a href="" @click.prevent="cancelEdit()" class="text-white mx-2 mb-2" style="text-decoration: none;"><img src="../../assets/img/ajout_profil.svg"/></a>
                  <a v-if="bibliActive==0" href="" @click.prevent="addToBibli()" class="text-white mx-2 mb-2" style="text-decoration: none;"><img src="../../assets/img/envoi_msg.svg"/></a>
                  <a v-else href="" class="text-white mx-2 mb-2" style="text-decoration: none;"><img src="../../assets/img/bibli_envoye.svg"/></a>
                  <a href="" @click.prevent="addToBibli()" class="text-white mx-2 mb-2" style="text-decoration: none;"><img src="../../assets/img/ajout_bibli.svg" ></a>
                  
                  
              </div>
            </div>
            <div class="row">
              <div class="col-5">
                <p>Location</p>
                <p>{{project.description}}</p>

              </div>
            </div>
            <div class="row" style="display:flex !important;flex-direction: column !important; ">
              <div class="row mb-2 shadow-sm bg-white p-4 mx-3" style="border-radius: 12px;">
                <div class="userPerso col-5" style="flex-shrink: 1 !important;">
                  <div class="row">
                    <img src="../../assets/img/blondefemale.png" class="sm-img" style="border-radius: 50%;">
                    <div class=" col-3">
                      <p class="font-weight-bold">{{user.prenom}}</p>
                      <p style="color:orange !important;">Metier</p>
                      <p class="text-muted">Localisation Non renseignée</p>
                    </div>
                  </div>
                </div>
                <div class="subscribe  offset-2 col-5 d-flex align-items-center justify-content-end">
                  <h4 style="color:#F37332">Porteur de projet</h4>
                  <p v-if="user.subscription_type == 2">Premium</p> 
                  <p v-else></p>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-12 d-flex justify-content-start" v-if="currentUser.user.id != user.id">
                <section class="skills">
                    <p color="#333333">Secteur d'activité</p>
                    <p class="badg" style="background-color: #333333 !important; color: white !important;"> {{ project.field }}</p>
                  </section>  
                  <section class="skills">
                    <p color="#3F3FA6 !important;">Type de marché</p>
                    <p class="badg" style="background-color: #3F3FA6 !important; color: white !important;"> {{ project.field }}</p>
                  </section>  
                  <section class="skills">
                    <p color="#F37332 !important;">Etat du projet</p>
                    <p class="badg" style="background-color: #F37332; !important; color: white !important;"> {{ project.field }}</p>
                  </section>  
              </div>
            </div>
          <div class="container row text-center">
            <div class="col-6">
              <div>
                <p class="text-center sectionTitle">
                  Présentation du projet
                </p>
                <p> {{  project.description }}</p>
              </div>
              <div>
                <p class="text-center sectionTitle">
                  Compétences
                </p>
                <section class="skills">
                    <p class="badg" v-for="skill in skills"> {{  skill.name }}</p>
                  </section>              
              </div>
              <div>
                <p class="text-center sectionTitle">
                  Soft Skills
                </p>
                <section class="skills">
                    <p class="badg" v-for="skill in skills"> {{  skill.name }}</p>
                  </section>   
              </div>

            </div>

            <div class="col-6">
              <div>
                <p class="text-center sectionTitle">
                  Experience
                </p>
                <p> {{  project.experience }}</p>
              </div>  
              <div>
                <p class="text-center sectionTitle">
                  Secteur d'activité
                </p>
                <section class="skills">
                    <p class="badg" v-for="field in project.field"> {{  field.name }}</p>
                  </section>              
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
  name: 'DetailProjectComponent',
  components: {NavbarConnected, Footer},
  data() {
    return {
      store,
      projectId: this.$route.params.id,
      project: {},
      user: {},
      skills:  [],
      skillsId: [],
      bibliActive: 0,
      currentUser: JSON.parse(localStorage.getItem("user")),
    }
  },
  created() {
    let self = this
      this.store.dispatch("getFullProject", {
        projectId: self.projectId
      }).then( (response) => {
          self.project = response.data.project
           self.skills = response.data.skills
          self.user = response.data.user
        }) 
  }, 
  methods: {
    addToBibli() {
      let self = this
      this.store.dispatch("addToBibliotheque", {
        projectId: self.projectId,
        userId: self.currentUser.user.user.id
      }).then( (response) => {
        if (response.status === 200 ) {
          if (response.data.added)
            self.bibliActive = 1
          }
        }) 
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

.col-6 div .sectionTitle{
  background-color: #F37332; border-radius: 12px; height:100%; color:white; margin:5px;
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

.input{
  margin-top: 20px;
  background-color: white !important;
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
</style>
