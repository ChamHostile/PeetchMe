<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <div class="row">
    <SideBarComponent></SideBarComponent>
    <div class="col-11">

    <section style="overflow-x:hidden !important; border-radius: 20px !important;" class="bg-white shadow-sm m-5">
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow-x:hidden !important;">
        <div class="col-7 mr-5 p-3 pt-5">
          <label for="searcher-search-input" class="font-weight-bold">Rechercher un domaine technique/métier afin d’afficher les associés idéal</label>
          <div class="input-group col-md-9 mx-auto">
            <input class="form-control py-2" type="search" placeholder="Rechercher" v-model="search">
            <span class="input-group-append">
              <button class="btn btn-secondary" type="button"   >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
              </button>
            </span>
          </div>
        </div>
      </div>
        <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
          <div class="col-12 mt-2 mb-5" style="overflow:hidden;">
            <label for="searcher-filter-input mt-2" class="font-weight-bold">Affiner votre recherche</label>
            <div class="row d-flex justify-content-center">
              <div class="col-2">
                <label class="form-label">Expérience</label>
                <select class="form-control form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-2">
                <label>Secteur d'activité</label>
                <select class="form-control form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-2">
                <label>Compétences</label>
                <select class="form-control form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-2">
                <label>Localisation</label>
                <select class="form-control form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              <div class="btn btn-primary mt-4" style="height:40px !important; border-radius: 10px; background-color: #3F3FA6; border:#3F3FA6;" @click.prevent="searchFilter()">Afficher les projets</div>
            </div>
          </div>
        </div>
    </section>
    <section style="overflow-x:hidden !important; margin-left: 100px !important;" class="mt-5 mx-5">
      <h5 class="mb-5">Mon projet</h5>
      <div class="row text-center" style="overflow:hidden !important;">
        <div class="col-4" v-if="project">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">{{project.description}}</p>
            </div>
          </div>
        </div>
        <div class="col-4" v-else>
          <p>Vous n'avez pas encore ajouté de projet</p>
        </div>
      </div>
    </section>
    <section style="overflow-x:hidden !important; margin-left: 100px !important;" class="mt-5 mx-5">
      <h5 class="mb-5">Associés pertinents</h5>
      <div class="row" style="overflow:hidden !important;">
        <div class="col-4" v-for="chercheur in chercheurs">
          <a @click="goToDetail(chercheur.id)" style="text-decoration: none; color:inherit;">
            <AssocieComponentVue v-if="chercheur.nom && chercheur.prenom"
            :prenom="chercheur.prenom"
            :metier="chercheur.metier"
            :description="chercheur.description" class="my-2"
          ></AssocieComponentVue>
        </a>
        </div>
      </div>
    </section>
    <div class="col mt-5 d-flex justify-content-end">
      <a class="btn btn-secondary text-white p-2 rounded" @click="goTo('SearchResultPorteur')">Voir plus...</a>
    </div>
    <section style="overflow-x:hidden !important;" class="mt-5 mx-5">
      <h6 class="projects">Articles</h6>
      <div class="row text-center d-flex aligns-items-center justify-content-center" style="overflow:hidden !important;">
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/coworkerafrican.png" class="card-img-top" alt="...">
            <div class="card-body">
             <img class="rounded"> 
              <p class="card-text">Avoir un projet, une passion et en faire son activité professionnelle !
              ...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/coworkerafrican.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Avoir un projet, une passion et en faire son activité professionnelle !
...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/coworkerafrican.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Avoir un projet, une passion et en faire son activité professionnelle !...</p>
            </div>
          </div>
        </div>
        <div class="col mt-2 d-flex justify-content-end">
          <p>Voir plus...</p>
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
import AssocieComponentVue from '../espace-chercheur/associe/AssocieComponent.vue'

export default {
  name: 'HomePorteur',
  components: { NavbarConnected, Footer, SideBarComponent, AssocieComponentVue },
  data () {
    return {
      store,
      chercheurs: [],
      search: "",
      project: JSON.parse(localStorage.getItem("project"))
    }
  },
  created() {
    let self = this
      this.store.dispatch("getChercheurs", {}).then( (response) => {
          console.log(response.data.chercheurs)
          
          self.chercheurs = response.data.chercheurs
          let newChercheurs = self.chercheurs.filter(f.prenom !== null);
          newChercheurs = self.chercheurs.slice(0, 3)
          self.store.dispatch("myProject", {}).then( (r) => {
            console.log(r.data)
          });
        }) 
      
    },
    methods: {
      goToDetail($id) {
        var url = "/chercheur/" + $id
        this.$router.push(url);  
      },
      goTo(name) {
        this.$router.push({name: name});
      },
      searchFilter() {
        self = this
        this.$router.push({name: 'SearchResultPorteur', query: {user: this.search} });
      }
    },
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  @import '../../assets/css/espace-chercheur.css';
</style>
