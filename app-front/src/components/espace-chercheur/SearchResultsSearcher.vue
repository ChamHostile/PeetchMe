<template>
  <div class="container-fluid m-0 p-0 bg-light" style="overflow-x:hidden">
    <NavbarConnected></NavbarConnected>
    <section style="overflow-x:hidden !important;">
      <p class="text-left my-5 offre">Vous êtes chercheur de projet</p>
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
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow-sm p-0">
            <img src="../../assets/img/project.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Ce projet à pour but de planter des arbres via une application et ainsi contribuer à l’évolution de notre environnement...</p>
            </div>
          </div>
        </div>
        <div class="col-8 mt-5 d-flex justify-content-end">
         <p>1 </p> sur 5
        </div>
        <div class="col-4 mt-5 d-flex justify-content-end">
          <p>Page suivante > </p>
        </div>
      </div>
    </section>
    <Footer class="mt-5"></Footer>
  </div>
</template>
<script>
import NavbarConnected from '../register/NavbarConnected'
import Footer from '../Footer'

export default {
  name: 'SearchResultSearcher',
  components: {NavbarConnected, Footer},
  data () {
    return {
    }
  }
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  @import '../../assets/css/espace-chercheur.css';
</style>
