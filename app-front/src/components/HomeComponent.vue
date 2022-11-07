
<template>
<div class="container-fluid m-0 p-0 bg-light">
  <div id="head" class="bg-danger full-height">
    <b-row align-h="between">
      <b-navbar variant="light" type="light" class="col-12">
        <b-navbar-brand href="#" class="mx-5 col-sm-2 text-center m-0"><img src="../assets/img/Logo_web.png" class="sm-img"></b-navbar-brand>
        <div class="col-5">
          <b-row align-h="between">
              <b-navbar-item class="text-dark mx-auto
              ">Entreprise</b-navbar-item>
              <b-navbar-item class="text-dark mx-auto
              ">Offres et tarifs</b-navbar-item>
              <b-navbar-item ar-item class="text-dark mx-auto
              ">Blog</b-navbar-item>
          </b-row>
        </div>
        <div class="offset-1 col-sm-4">
          <b-button size="md" class="button-blue"><router-link to="/register" class="text-light">Inscription</router-link></b-button>
          <b-button size="md" class="bg-light border-primary text-primary ml-3">Se connecter</b-button>
        </div>

    </b-navbar>
  </b-row>
<section class="row">
  <div class="associate-section col-7 text-white p-5 align-items">
      <h1 class="ml-5 title offset-1 mt-4">Vous recherchez <br>l'associé parfait ?</h1>
      <p class="ml-4 col-9 mt-4">Que vous soyez porteur d'un projet ou à la recherche d'une opportunité entrepreneuriale, nous pouvons vous aider à trouver le cofondateur qui vous correspond et à créer l’entreprise de vos rêves !</p>
      <b-button class="button-blue ml-5 mt-3 offset-1">Créez votre compte</b-button>
    </div>

</section>
  </div>
  <div class="row align-items-center span-peetch">
    <div class="col-9 mx-auto bg-light text-dark text-center m-0 p-5 title-associates">
      Avec PeetchMe, matchez votre associé !
    </div>
  </div>
  <p class="text-dark know-more text-center mb-5">
    En savoir plus
          <br><span style="height: 36px; width: 36px">↓</span>
  </p>
  <div id="home-page" class="bg-light p-4">
    <div class="row section-stat">
     <div class="col-10 bg-dark text-white mx-auto rounded pb-5">
      <p class="font-weight-bold text-center p-5 pb-5 mx-auto">
        Que vous soyez porteur d'un projet ou à la recherche d'une opportunité entrepreneuriale,<br> nous pouvons vous aider à trouver le cofondateur qui vous correspond et à créer <br>l’entreprise de vos rêves !
      </p>
     </div>
     <div class="row stats text-center mb-5">
        <div class="text-white py-3 px-5 col-2 ml-auto rounded-left" style="background: #F37332;">
          <h3>82 %</h3>
          <p>Entrepreneurs solitaires qui abandonnent leurs projets</p>
        </div>
        <div class="bg-light text-dark py-3 px-5 col-2">
          <h3>1 milion</h3>
          <p>Entreprise crée en 2021</p>
        </div>
        <div class="text-white py-3 px-5 col-2 " style="background: #F37332;">
          <h3>68 %</h3>
          <p>Des créations d'entreprises proviennent de l'idée d'une seule personne</p>
        </div>
        <div class="bg-light text-dark py-3 px-5 col-2 mr-auto rounded-right">
          <h3>40 %</h3>
          <p>des entreprises sont lancées par plusieurs créateurs</p>
        </div>
      </div>
     </div>
  </div>
  <div id="associates" class="bg-light ml-0 mr-0 row">
    <div class="col-4 ml-0 pl-0" id="associate-1">
      <img src="../assets/img/businessman.png">
    </div>
    <div class="col-6 my-auto">
      <h2>Vous êtes porteurs de projets ?</h2>
      <p class="col-8 p-0 mt-4">Profitez de la plateforme pour déposez votre pitch de présentation de projet et sélectionnez vos profils d’associés coup de cœur parmi une liste en un seul clic.</p>
      <button class="btn button-blue mt-2">Je m'inscris</button>
    </div>
    <div class="col-8 my-auto pr-0 mx-0 text-right">
      <h2 class="mr-5">Vous êtes porteurs de projets ?</h2>
      <p class="p-0 pr-0 mt-4 mx-0 text-right mr-5">Profitez de la plateforme pour déposez votre pitch de présentation de projet et sélectionnez vos profils d’associés coup de cœur parmi une liste en un seul clic.</p>
      <button class="btn button-blue mt-2 mr-5">Je m'inscris</button>
    </div>
    <div class="col-4 mr-0 pl-0" id="associate-2">
      <img src="../assets/img/coworkers.png">
    </div>

  </div>

  <section id="match" class="mt-5 p-5 pt-2 col-10 mx-auto text-white text-center rounded">
    <h2> C'est le match !</h2>
    <p class="mt-5">Vous entrez en contact et maintenant c'est à vous de jouer ! </p>
  </section>

  <section id="find" class="mx-auto find mt-5 text-center mb-5">
    <h1 class="mt-2 mb-4">Comment trouver le bon associer ?</h1>
    <p class="font-weight-bold mb-3">La collaboration se basera principalement sur la confiance, la complémentarité, le dynamisme et l'optimisme</p>
    <p>Vous êtes en recherche de partenaires ? Renseignez toutes les informations nécessaires et publiez votre annonce</p>
  </section>

  <section id="find-2" class="col-8 mx-auto find mt-5 text-center mb-5">
    <h1 class="mt-2 mb-4">Trouver le projet qui vous correspond</h1>
    <p class="font-weight-bold mb-3">La recherche et le choix d’un projet doit être le plus pertinent selon vos préférence. Intéressez vous non seulement au projet mais aussi à la personne derrière ce projet. Au quel cas vous risquez de ne pas satisfaire vos attentes.
    </p>
    <p>Vous recherchez un projet ? Connectez-vous dès maintenant et découvrez tous les projets qui vous correspondent</p>
  </section>

  <hr class="col-7 mt-5">

  <div id="reasons" class="col-9 mx-auto mt-5 text-center mb-5">
      <h3 class="mt-5">6 raisons de nous choisir</h3> <br>
      <div class="row mx-auto text-center">
        <div class="mx-auto col-3 card ">
          <span>SOLUTION CLÉS EN MAIN</span>
          <p>À chaque besoin, correspond une offre complète avec support adapté.</p>
        </div>
        <div class="col-3 mx-auto card">
          <span>PRIX AVANTAGEUX</span>
          <p>Le prix le plus juste pour vous permettre d’ouvrir les portes de l’entrepreneuriat en toute sérénité.</p>
        </div>
        <div class="col-3 mx-auto card">
          <span>EFFICACITÉ</span>
          <p>Plateforme très simple et rapide, quel que soit votre environnement technique.</p>
        </div>
    </div>
    <div class="row mx-auto my-5">
      <div class="mx-auto col-3 card">
        <span>SÉRÉNITÉ</span>
        <p>Rencontrer des associés afin de ne plus être sous la menace d’une dépendance technique.</p>
      </div>
      <div class="col-3 card mx-auto">
        <span>UNE ÉQUIPE DE SUPPORT DYNAMIQUE</span>
        <p>Humaine et réellement à votre écoute.</p>
      </div>
      <div class="col-3 card mx-auto">
        <span>SÉCURITÉ</span>
        <p>Protection de vos données personnelles</p>
      </div>
    </div>
  </div>

  <div id="footer" class="row bg-dark p-5 text-white h-100 mx-auto">
    <p class="offset-2 text-left p-3">Copyright © 2022 PeetchMe</p>
    <p class="offset-4 text-right p-3">Powered by PeetchMe</p>
  </div>
</div>

</template>

<script>
export default {
  name: 'HomeComponent',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import '../assets/css/home.css';

</style>
