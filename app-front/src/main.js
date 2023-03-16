// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import App from './App'
import router from './router'
import store from './store'
import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import loading from './components/loading'
import { MultiSelectPlugin } from "@syncfusion/ej2-vue-dropdowns";
import { registerLicense } from '@syncfusion/ej2-base';
import { MultiSelect, CheckBoxSelection } from '@syncfusion/ej2-dropdowns';

import './app.css'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
MultiSelect.Inject(CheckBoxSelection);
registerLicense('Mgo+DSMBaFt/QHRqVVhkVFpHaV5GQmFJfFBmTWlceVRzdUUmHVdTRHRcQl9iS3xTc0NgW3tedHU=;Mgo+DSMBPh8sVXJ0S0J+XE9AflRBQmJNYVF2R2BJd1R1cl9FYUwxOX1dQl9gSXxSdEdjXHldcnFRQmI=;ORg4AjUWIQA/Gnt2VVhkQlFacldJXnxIekx0RWFab1Z6cVNMY11BJAtUQF1hSn5Rd0dhWXpYc3ZQQ2de;MTExNTg4NUAzMjMwMmUzNDJlMzBKVWZrYTRlQVdqOWdNSEpPSkNYaHV2bG16SlQwMElyTGVtc0Z4WWxjZWVFPQ==;MTExNTg4NkAzMjMwMmUzNDJlMzBUSFR2MnpPWklOckhmYnZvTE1IMUlDZkE3MTM0S2tBRlVjZGVwMUNleE5ZPQ==;NRAiBiAaIQQuGjN/V0Z+WE9EaFtKVmBWf1dpR2NbfE54flBAal9QVBYiSV9jS31TdERhW39bdndXQGlZUg==;MTExNTg4OEAzMjMwMmUzNDJlMzBaU3JodHV3cjF1K0k3WGN5dTZ6OUFlcFRYZkVqU3NaT09wUGJhZXYzNktVPQ==;MTExNTg4OUAzMjMwMmUzNDJlMzBBeEFZbUtxaFRaZlVjUEMyNVgyeVpXeWsvU1VQVkN0M0x1UTRQOGZ5a3JJPQ==;Mgo+DSMBMAY9C3t2VVhkQlFacldJXnxIekx0RWFab1Z6cVNMY11BJAtUQF1hSn5Rd0dhWXpYc3ZSQGZZ;MTExNTg5MUAzMjMwMmUzNDJlMzBCVmNxKytLallQQ1dhNTQ5cVJyblpFc3hWQ24vK2FZbE1OcXBpVXJubys4PQ==;MTExNTg5MkAzMjMwMmUzNDJlMzBkQUJZK1hMcFQ3SkxMWDcvR1VBMEN4bEJ0bFNKNXdDSngwTkE3VzZkSkQwPQ==;MTExNTg5M0AzMjMwMmUzNDJlMzBaU3JodHV3cjF1K0k3WGN5dTZ6OUFlcFRYZkVqU3NaT09wUGJhZXYzNktVPQ==');
Vue.use(MultiSelectPlugin)


Vue.directive('loading', loading)


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
