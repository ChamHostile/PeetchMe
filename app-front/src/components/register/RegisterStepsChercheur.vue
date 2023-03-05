<template>
  <div id="app" class="my-4 container-fluid bg-light">
    <navbarRegister class="mb-5"></navbarRegister>
    <stepper :steps="steps" class="bg-light">
      <template #fatal-error="{ errorMsg }">{{ errorMsg }}</template>
    </stepper>
  </div>
</template>
<script>
import Stepper from './StepperChercheur'
import StepsChercheur1 from './steps/StepsChercheur1'
import StepsChercheur2 from './steps/StepsChercheur2'
import StepsChercheur3 from './steps/StepsChercheur3'
import NavbarRegister from './NavbarRegister'

export default {
  name: 'RegisterSearcher',
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
          component: StepsChercheur1
        },
        {
          name: '2',
          desc:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
          disabled: false,
          active: false,
          component: StepsChercheur2
        },
        {
          name: '3',
          desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          icon: 'fas fa-check',
          disabled: false,
          active: false,
          component: StepsChercheur3,
          confirm: 'Envoyer'
        }
      ]
    }
  }
}
</script>
