import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from '@/components/HomeComponent'
import RegisterComponent from '@/components/register/RegisterComponent'
import RegisterSearcher from '@/components/register/RegisterStepsChercheur'
import RegisterPorteur from '@/components/register/RegisterStepsPorteur'
import RegisterSubscription from '@/components/register/steps/RegisterSubscription'
import HomeSearcher from '@/components/espace-chercheur/HomeSearcher'
import SearchResultSearcher from '@/components/espace-chercheur/SearchResultsSearcher'

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
      path: '/register/searcher',
      name: 'RegisterSeacher',
      component: RegisterSearcher
    },
    {
      path: '/register/porteur',
      name: 'RegisterPorteur',
      component: RegisterPorteur
    },
    {
      path: '/register/subscription',
      name: 'RegisterSubscription',
      component: RegisterSubscription
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
    }
  ]
})
