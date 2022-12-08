import Vuex from 'vuex'
import Vue from 'vue'

import axios from 'axios'

Vue.use(Vuex)

const instance = axios.create({
  baseURL: 'http://localhost:8080/api'
})

let user = localStorage.getItem('user')
if (!user) {
  user = {
    userId: -1,
  }
} else {
  try {
    user = JSON.parse(user)
  } catch (ex) {
    user = {
      userId: -1,
      token: ''
    }
  }
}

const store = new Vuex.Store({
  state: {
    timeout: '',
    user: user,
    userInfos: {},
    userRegister: {}
  },
  actions: {
    createAccount: async ({commit, state}) => {
      return instance.post('/register', state.userRegister)
        .then(function (response) {
          console.log(response.status)
          commit("setUser", {
            user: response.data
          })
          resolve(response)
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    editAccount: ({commit, state}) => {
      instance.post('/registerEdit', state.userInfos)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          console.log(error)
        })  
    },
    login: async ({commit}, userInfos, state ) => {
       return instance.post('/login', userInfos)
        .then(function (response) {
          commit("setUser", {
            user: response.data
          })
          console.log(state.user, state.userInfos)
          resolve(response)
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    logout: ({commit}) => {
      instance.post('/logout')
        .then(function (response) {
          commit('logout')
          resolve(response)
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  },
  mutations: {
    setUser: function (state, user) {
      localStorage.setItem('user', JSON.stringify(user))
      state.user = user
    },
    logout: function (state) {
      state.user = {
        id: -1
      }
      localStorage.removeItem('user')
    },
    storeAccount: function (state, userInfos) {
      state.userInfos.data = userInfos
    },
    storeProject: function (state, userProject) {
      state.userInfos.project = userProject
    },
    storeRegister: function (state, userRegister) {
      state.userRegister = userRegister
    }
  }
})

export default store
