<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11">
    <section style="overflow-x:hidden !important;">
      <p class="text-left my-5 offre">Vous êtes porteur de projet</p>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-10 mr-5 mt-5 mb-3" style="overflow:hidden;">
          <label for="searcher-filter-input">Affiner votre recherche</label>
          <div class="row d-flex justify-content-center">
            <div class="col-2">
              <label class="form-label">Domaine d'étude</label>
              <select class="form-control form-select" aria-label="Default select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-2">
              <label>Catégorie de service</label>
              <select class="form-control form-select" aria-label="Default select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-2">
              <label>Lieu/Distance</label>
              <select class="form-control form-select" aria-label="Default select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            <div class="btn btn-primary mt-4" style="height:40px !important; border-radius: 10px; background-color: #3F3FA6; border:#3F3FA6;">Rechercher votre associé</div>
          </div>
        </div>
      </div>
    </section>
    <section style="overflow-x:hidden !important; margin-bottom: 150px;" class="mt-5 mx-5">
      <h6 class="projects">Résultats en fonction de votre recherche</h6>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-4" v-for="chercheur in chercheurs">
        <a @click="goToDetail(chercheur.id)" style="text-decoration: none; color:inherit;">
          <div class="card shadow-sm p-0" v-if="chercheur.nom && chercheur.prenom">
            <div class="section mt-3">
              <div class="row mx-auto">
                <img src="https://via.placeholder.com/104" class="col-4" style="border-radius: 50%;">
                <div class="text col-7" style="font-weight: normal !important; background: #E2E2E2; border-radius: 0px 30px 30px 0px;">
                <p class="text-dark">{{ chercheur.prenom }}</p>
                <p> Metier </p>
                </div>
              </div>
            </div>
            
            <p class="text-center">Détail <img src="../../assets/img/dropdown.svg" class="" style="width: 30px;"></p>
            <div class="card-body">
              <p class="card-text">{{ chercheur.description }}</p>
            </div>
          </div>
        </a>
        </div>
        <div class="col-8 mt-5 d-flex justify-content-end">
         <p>{{ currentPage }} </p> sur {{maxPage}}
        </div>
        <div class="col-4 mt-5 d-flex justify-content-end" @click="nextPage()">
          <p>Page suivante > </p>
        </div>
      </div>
    </section>
   </div>
   </div> 
    <Footer class="mt-5"></Footer>
  </div>
</template>
<script>
import NavbarConnected from '../register/NavbarConnected'
import SideBarComponent from '../SideBarComponent.vue'
import Footer from '../Footer'
import store from '../../store'

export default {
  name: 'SearchResultPorteur',
  components: {NavbarConnected, Footer, SideBarComponent},
  data () {
    return {
      store,
      chercheurs: [],
      maxResult: '',
      maxPage: '',
      currentPage: 1
    } 
  },
  created() {
    let self = this
      this.store.dispatch("getChercheurs", {}).then( (response) => {
          console.log(response.data.chercheurs)
          self.chercheurs = response.data.chercheurs
          self.maxResult = response.data.maxResult
          self.maxPage = response.data.maxPages
          console.log(self.projects)
        })
    },
    methods: {
      nextPage() {
        if ((this.currentPage == this.maxPage) && (this.currentPage > this.maxPage)) {
          this.currentPage = this.maxPage;
          return;
        }
        let self = this
        this.currentPage = this.currentPage + 1
        this.store.dispatch("getChercheurs", {
            page: self.currentPage,
        }).then( (response) => {
          self.chercheurs = response.data.chercheurs
          self.maxResult = response.data.maxResult
          self.maxPage = response.data.maxPages
        })
      },
       goToDetail($id) {
        var url = "/chercheur/" + $id
        this.$router.push(url);  
      }
    },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  @import '../../assets/css/espace-chercheur.css';
</style>
