<template>
  <div id="app" class="container-fluid bg-light">
    <navbarRegister class="mb-5"></navbarRegister>
    <stepper :steps="steps" class="bg-light">
      <template #fatal-error="{ errorMsg }">{{ errorMsg }}</template>
    </stepper>
  </div>
</template>
<script>
import Stepper from './StepperPorteur'
import StepsPorteur1 from './steps/StepsPorteur1'
import StepsPorteur2 from './steps/StepsPorteur2'
import StepsPorteur3 from './steps/StepsPorteur3'
import StepsPorteur4 from './steps/StepsPorteur4'

import NavbarRegister from './NavbarRegister'

export default {
  name: 'RegisterPorteur',
  components: {
    Stepper,
    NavbarRegister
  },
  data () {
    return {
      steps: [
        {
          name: '1',
          desc:
              'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
          icon: 'fas fa-car',
          disabled: false,
          active: true,
          component: StepsPorteur1
        },
        {
          name: '2',
          desc:
              'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
          disabled: false,
          active: false,
          component: StepsPorteur2
        },
        {
          name: '3',
          desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          icon: 'fas fa-check',
          disabled: false,
          active: false,
          component: StepsPorteur3
        },
        {
          name: '4',
          desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          icon: 'fas fa-check',
          disabled: false,
          active: false,
          confirm: 'Envoyer',
          component: StepsPorteur4
        }
      ]
    }
  }
}
</script>
