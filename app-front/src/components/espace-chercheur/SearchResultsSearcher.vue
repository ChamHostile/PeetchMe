<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11" style="margin-top: 120px;">
    <section style="overflow-x:hidden !important;">
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow-x:hidden !important;">
        <div class="col-7 mr-5">
          <label for="searcher-search-input">Rechercher un domaine technique/métier afin d’afficher les projets adaptés à votre besoin</label>
          <div class="input-group col-md-9 mx-auto">
            <input class="form-control py-2" type="search" placeholder="Rechercher">
            <span class="input-group-append">
              <button class="btn btn-secondary" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
              </button>
            </span>
          </div>
        </div>
        <div class="btn btn-primary mt-4" style="height:40px !important; border-radius: 10px; background-color: #3F3FA6; border:#3F3FA6;">Afficher les projets</div>
        </div>
    </section>
    <section style="overflow-x:hidden !important; margin-bottom: 150px;" class="mt-5 mx-5">
      <h6 class="projects">Résultats en fonction de votre recherche</h6>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-4" v-for="project in projects">
          <div class="card shadow-sm p-0" @click="goToDetail(project.id)">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">{{ project.description }}</p>
            </div>
          </div>
        </div>
        <div class="col-8 mt-5 d-flex justify-content-end">
         <p>{{ currentPage }} </p> sur {{maxPage}}
        </div>
        <div class="col-4 mt-5 d-flex justify-content-end">
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
import Footer from '../Footer'
import store from '../../store'
import SideBarComponent from '../SideBarComponent.vue'

export default {
  name: 'SearchResultSearcher',
  components: {NavbarConnected, Footer, SideBarComponent},
  data () {
    return {
      store,
      projects: [],
      maxResult: '',
      maxPage: '',
      currentPage: 1
    }
  },
  created() {
    let self = this
      this.store.dispatch("getProjects", {}).then( (response) => {
          console.log(response.data.projects)
          self.projects = response.data.projects
          self.maxResult = response.data.maxResult
          self.maxPage = response.data.maxPages
          console.log(self.projects)
        })
    },
    methods: {
      goToDetail($id) {
        var url = "/project/" + $id
        this.$router.push(url);  
      }
    },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  @import '../../assets/css/espace-chercheur.css';
</style>
