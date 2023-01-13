import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from '@/components/HomeComponent'
import RegisterComponent from '@/components/register/RegisterComponent'
import RegisterSearcher from '@/components/register/RegisterStepsChercheur'
import RegisterPorteur from '@/components/register/RegisterStepsPorteur'
import RegisterSubscription from '@/components/register/steps/RegisterSubscription'
import HomeSearcher from '@/components/espace-chercheur/HomeSearcher'
import SearchResultSearcher from '@/components/espace-chercheur/SearchResultsSearcher'
import HomePorteur from '@/components/espace-porteur/HomePorteur'
import Login from '@/components/LoginComponent'
import DashboardSearcher from '@/components/espace-chercheur/DashboardSearcher'
import DashboardPorteur from '@/components/espace-porteur/DashboardPorteur'
import SearchResultPorteur from '@/components/espace-porteur/SearchResultsPorteur'
import DetailProjectComponent from '@/components/espace-porteur/DetailProjectComponent'
import DetailSearcherComponent from '@/components/espace-chercheur/DetailSearcher'
import SearcherUpdate from '@/components/espace-chercheur/SearcherUpdate'
import RegistrationForm from '@/components/register/steps/RegistrationForm'
import RegisterInfos from '@/components/register/steps/RegisterInfos'
import RegisterPersonal from '@/components/register/steps/RegisterPersonal'




import Vuex from 'vuex'

Vue.use(Vuex)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeComponent
    },
    {
      path: '/register',
      name: 'Register',
      component: RegisterComponent
    },
    {
      path: '/register/create',
      name: 'RegistrationForm',
      component: RegistrationForm
    },
    {
      path: '/register/infos',
      name: 'RegisterInfos',
      component: RegisterInfos
    },
    {
      path: '/register/perso',
      name: 'RegisterPersonal',
      component: RegisterPersonal
    },
    {
      path: '/searcher/home',
      name: 'HomeSearcher',
      component: HomeSearcher
    },
    {
      path: '/searcher/results',
      name: 'SearchResultSearcher',
      component: SearchResultSearcher
    },
    {
      path: '/porteur/home',
      name: 'HomePorteur',
      component: HomePorteur
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/dashboardSearcher',
      name: 'DashboardSearcher',
      component: DashboardSearcher
    },
    {
      path: '/dashboardPorteur',
      name: 'DashboardPorteur',
      component: DashboardPorteur
    },
    {
      path: '/porteur/results',
      name: 'SearchResultPorteur',
      component: SearchResultPorteur
    },
    {
      path: '/project/:id',
      name: 'DetailProject',
      component: DetailProjectComponent
    },
    {
      path: '/chercheur/:id',
      name: 'DetailSearcher',
      component: DetailSearcherComponent
    },
    {
      path: '/user/update',
      name: 'SearcherUpdate',
      component: SearcherUpdate
    }
    
  ]
})
