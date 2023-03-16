<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11">
    <section style="overflow-x:hidden !important;">
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-10 mr-5 mt-5 mb-3" style="overflow:hidden;">
          <section style="overflow-x:hidden !important;">
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow-x:hidden !important;">
        <div class="col-7 mr-5">
          <div class="input-group col-md-9 mx-auto">
            <input class="form-control py-2" type="search" placeholder="Rechercher" v-model="search">
            <span class="input-group-append">
              <button class="btn btn-secondary" type="button" @click.prevent="searchFilter()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
              </button>
            </span>
          </div>
        </div>
        </div>
    </section>
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
            <div class="btn btn-primary mt-4" style="height:40px !important; border-radius: 10px; background-color: #3F3FA6; border:#3F3FA6;" @click.prevent="searchFilter()">Rechercher votre associé</div>
          </div>
        </div>
      </div>
    </section>
    <section style="overflow-x:hidden !important; margin-bottom: 150px;" class="mt-5 mx-5">
      <h6 class="projects">Résultats en fonction de votre recherche</h6>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-4" v-for="chercheur in chercheurs">
          <a @click="goToDetail(chercheur.id)" style="text-decoration: none; color:inherit;">
            <AssocieComponentVue v-if="chercheur.nom && chercheur.prenom"
            :prenom="chercheur.prenom"
            :metier="chercheur.metier"
            :description="chercheur.description"
            class="my-2"
          ></AssocieComponentVue>
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
import AssocieComponentVue from '../espace-chercheur/associe/AssocieComponent.vue'
import Footer from '../Footer'
import store from '../../store'

export default {
  name: 'SearchResultPorteur',
  components: {NavbarConnected, Footer, SideBarComponent, AssocieComponentVue},
  data () {
    return {
      store,
      chercheurs: [],
      maxResult: '',
      maxPage: '',
      currentPage: 1,
      search: ""
    } 
  },
  created() {
    let self = this
    let searchDetail = null;
    if (this.$route.query) {
      searchDetail = this.$route.query.user
    }
      this.store.dispatch("getChercheurs", {
        search: searchDetail
      }).then( (response) => {
          console.log(response.data.chercheurs)
          self.chercheurs = response.data.chercheurs
          self.maxResult = response.data.maxResult
          self.maxPage = response.data.maxPages
          console.log(self.chercheurs)
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
      },
      searchFilter() {
        self = this
        this.chercheurs = []
        this.store.dispatch("getChercheurs", {
          search: this.search
        }).then( (response) => {
          console.log(response.data.chercheurs)
          self.chercheurs = response.data.chercheurs
          self.maxResult = response.data.maxResult
          self.maxPage = response.data.maxPages
          console.log(self.chercheurs)
        })
      }
    },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  @import '../../assets/css/espace-chercheur.css';
</style>
