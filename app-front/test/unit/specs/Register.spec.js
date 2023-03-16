import Vue from 'vue'
import RegistrationForm from '@/components/register/steps/RegistrationForm'
const axios = require("axios");

jest.mock("axios")

describe('RegistrationForm.vue', () => {
  it('correctly registers the user with required infos', () => {
    let baseURL = 'http://localhost:8080/api'
    const Constructor = Vue.extend(RegistrationForm)
    const vm = new Constructor().$mount()
    res = { email: "test@unit.fr", 
            password: "testpwd" }
    axios.get.mockImplementation((url) => {
      if (url === baseUrl+'/register') {
        return Promise.resolve(res)
      }
    })

    vm.createAccount().then(response => {
      expect(response)
      .toEqual("true")
      done()
    })
  })   
})