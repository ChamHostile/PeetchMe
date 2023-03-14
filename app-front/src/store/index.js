import Vuex from 'vuex'
import Vue from 'vue'

import axios from 'axios'

Vue.use(Vuex)

const instance = axios.create({
  baseURL: 'http://localhost:8080/api',
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
      return new Promise((resolve, reject) => {
        instance.post('/register', state.userRegister)
        .then(function (response) {
          console.log(response.status)
          commit("setUser", {
            user: response.data
          })
          resolve(response);
        })
        .catch(function (error) {
          reject(error)
        })
      }) 
    },
    editAccount: ({state, commit}) => {
      return new Promise((resolve, reject) => {
        instance.post('/registerEdit', state.userInfos)
        .then(function (response) {
          commit("setUser", {
            user: response.data
          })
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    editDashboard: ({state, commit}, editInfos) => {
      return new Promise((resolve, reject) => {
        instance.post('/registerEdit', editInfos)
        .then(function (response) {
          console.log(response.data)
          commit("setUser", {
            user: response.data
          })
          resolve(response)
        })
        .catch(function (error) {
          console.log(error)
          reject(error)
        })  
      })
    },
    getUser: ({state}, userId) => {
      let url = '/users/' + userId.id
      return new Promise((resolve, reject) => {
        instance.get(url, userId)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getUserFull: ({state, commit}, userId) => {
      let url = '/getUserFull'
      return new Promise((resolve, reject) => {
        instance.post(url, userId)
        .then(function (response) {
          commit("setUser", {
            user: response.data
          })
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getUserDetail: ({state, commit}, userId) => {
      let url = '/getUserFull'
      return new Promise((resolve, reject) => {
        instance.post(url, userId)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    newMessage: ({state, commit}, userId) => {
      let url = '/getUserFull'
      return new Promise((resolve, reject) => {
        instance.post(url, userId)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    addToBibliotheque: ({state, commit}, userId) => {
      let url = '/addToBibliotheque'
      return new Promise((resolve, reject) => {
        instance.post(url, userId)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    setUserType: ({state, commit}, data) => {
      let url = '/user/setType'
      return new Promise((resolve, reject) => {
        instance.post(url, data)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getProjects: async ({state}, search) => {
      let url = '/match/porteurs'
      return new Promise((resolve, reject) => {
        instance.post(url, {search})
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getSkill: async ({state}, skillUrl) => {
      let url = skillUrl.url
      return new Promise((resolve, reject) => {
        instance.get(url)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    myProject: ({commit, state}) => {
      let url = '/getProject';
      let user = JSON.parse(localStorage.getItem("user"));
      // const userId = user.id;
      // let idPayload = {
      //   id: userId
      // }
      let idPayload = {id: user.user.user.id}
      console.log(user);
      console.log(idPayload)
      return new Promise((resolve, reject) => {
        instance.post(url, idPayload)
        .then(function (response) {
          resolve(response)
          if (response.data.project !== undefined && response.data.project !== null) {
            commit('setProject', response.data)
          }
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getFullProject: ({commit, state}, payload) => {
      let url = '/getProjectFull';
      return new Promise((resolve, reject) => {
        instance.post(url, payload)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    getChercheurs: async ({state}, search) => {
      let url = '/match/chercheur'
      return new Promise((resolve, reject) => {
        instance.post(url, search)
        .then(function (response) {
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })  
      })
    },
    login: ({commit, state}, userInfos) => {
       return new Promise((resolve, reject) => {
        instance.post('/login', userInfos)
        .then(function (response) {
          commit("loginUser", {
            token: response.data 
          })
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })
       }) 
    },
    loginToken: async ({commit}) => {
      return new Promise((resolve, reject) => {
       instance.get('/me')
       .then(function (response) {
        commit('setId', response.data.id)
         resolve(response)
       })
       .catch(function (error) {
         reject(error)
       })
      }) 
   },
   userInfos: async ({commit, state}) => {
    let url = '/users/' + state.user.id
    return new Promise((resolve, reject) => {
     instance.get(url)
     .then(function (response) {
      commit('setUser', response.data)
       resolve(response)
     })
     .catch(function (error) {
       reject(error)
     })
    }) 
    },
    logout: ({commit}) => {
      new Promise((resolve, reject) => {
        instance.post('/logout')
        .then(function (response) {
          commit('logout')
          resolve(response)
        })
        .catch(function (error) {
          reject(error)
        })
      })
    }
  },
  
  mutations: {
    loginUser: function (state, token) {
      state.user.token = token
      localStorage.setItem('token', JSON.stringify(token))
      instance.defaults.headers.common = {'Authorization': `Bearer ${token.token.token}`}
      console.log(token.token.token)
      console.log(instance.defaults.headers.common.Authorization)
    },
    setUser: function (state, user) {
      localStorage.setItem('user', JSON.stringify(user))
      state.user = user
    },
    setProject: function (state, project) {
      localStorage.setItem('project', JSON.stringify(project))
      state.project = project
    },
    setId: function(state, id) {
      state.user.id = id
      console.log(state.user.id)
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
