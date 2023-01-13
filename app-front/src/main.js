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
registerLicense('Mgo+DSMBaFt/QHRqVVhkX1pGaV5DQmFJfFBmRGNTfll6dlNWESFaRnZdQV1iSHxSdkdjWHhYcXVc;Mgo+DSMBPh8sVXJ0S0J+XE9AdVRAQmJIYVF2R2BJfl56dVJMYlpBNQtUQF1hSn5Sd0diWX1ecXNTQWRV;ORg4AjUWIQA/Gnt2VVhkQlFaclxJX3xIf0x0RWFab19wflRBal5XVAciSV9jS31Td0RhWH9ccHVSQGhbWA==;OTI4MDkyQDMyMzAyZTM0MmUzMGhYdUp6eHNmSEViWFBOMGZCNjNHNll5akJ5Z1pGQklXQTNubjRvWjhVOU09;OTI4MDkzQDMyMzAyZTM0MmUzMFA1dzBNdzUyRnRNR3pCZ2xVVXBOTk52emxTU3BTZGR4ai81eDNBMEUzZ1k9;NRAiBiAaIQQuGjN/V0Z+WE9EaFtBVmFWf1JpR2NbfE5xdF9HZ1ZTQmYuP1ZhSXxQdkRiW35ecnRUQWdYU00=;OTI4MDk1QDMyMzAyZTM0MmUzMG1ldlE4bDdWNk81VGEyWGNFdkQvbGxJaGRtL3VldXBVN1oxaVEzTDBFUkk9;OTI4MDk2QDMyMzAyZTM0MmUzMFRsZlNZUjVxNGp4dEdtcW8wZHIwUTBxdCsxdGFla1Z2WXVGam9kTHFEK0E9;Mgo+DSMBMAY9C3t2VVhkQlFaclxJX3xIf0x0RWFab19wflRBal5XVAciSV9jS31Td0RhWH9ccHVSTmFZWA==;OTI4MDk4QDMyMzAyZTM0MmUzME9qTVA4NXpMU3orQ2o3QjcwaVpSaXU5VUpCTGcvTUVhMlk2ZkZ3ZFk5ZTQ9;OTI4MDk5QDMyMzAyZTM0MmUzMEk1Z2llbG92VnR3blBGdmpVZVFJeTRDUnV4Mk83OXd0cnVPZHBCMWVqZFE9;OTI4MTAwQDMyMzAyZTM0MmUzMG1ldlE4bDdWNk81VGEyWGNFdkQvbGxJaGRtL3VldXBVN1oxaVEzTDBFUkk9');
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
