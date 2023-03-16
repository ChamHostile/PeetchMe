<template>
  <div class="container">
  <div class="row">
    <div class="col-4 messagerie">
     <a href="" v-for="chatroom in chatrooms" class="row mt-3" @click.prevent="getMessages(chatroom)">
      <img src="https://via.placeholder.com/104" style="width:100%; height:100%; border-radius:12px !important;" class="col-4"/>
      <div class="col-7 text-left">
      <p>{{getChatRoomUser(chatroom, 'prenom')}}</p>
      <p style="color:rgb(243, 115, 50);">{{getChatRoomUser(chatroom, 'metier')}}</p>
      </div>
      <hr>
     </a> 
    </div>

    <div class="col-7 messagerie ml-5" style="position:relative;">
    <div class="message-container" style="min-height: 400px;">
      <span style="background-color:tomato; color:white;" v-for="message in messages" :class="positionMessage(message)">{{ message.message }}</span>
    </div>
    <div class="row">
    <input type="text" class="form-control mx-2 mb-2 col-9" style="position:absolute; bottom:0">  
     <button class="btn btn-primary mb-2 col-2 mr-2" style="position: absolute; bottom: 0; right:0">Envoyer message</button>
    </div>
    </div>
  </div>
</div>

</template>
<script>
import store from '../../store'

export default {
  name: 'DetailProjectComponent',
  components: {},
  data() {
    return {
      store,
      project: {},
      user: {},
      skills:  [],
      skillsId: [],
      chatrooms: {},
      messages: {},
      currentUser: JSON.parse(localStorage.getItem("user")),
    }
  },
  created() {
    let self = this
      this.store.dispatch("getChatrooms", {
        userId: this.currentUser.user.user.id
      }).then( (response) => {
          self.chatrooms = response.data.chatrooms
        }) 
        console.log(self.chatrooms)
  }, 
  methods: {
    async getChatRoomUser(chatroom, attr) {
      console.log(chatroom)
      console.log(chatroom.user1)
      console.log(this.currentUser.user.user.id)
      let id = chatroom.user2
      if (chatroom.user1 == this.currentUser.user.user.id) {
        let id = chatroom.user2
      } else {let id = chatroom.user1 }
        const response = await this.store.dispatch("getUser", {
        id: id
      })
        console.log(response['data'][attr])
        return response['data'][attr]
      },
    getMessages(chatroom) {
      let myChatroom = chatroom.id
      console.log(myChatroom)
    let self = this
      this.store.dispatch("getMessages", {
        chatroomId: myChatroom
      }).then( (response) => {
          self.messages = response.data.messages
        }) 
    },
    positionMessage(message) {
      return this.currentUser.user.user.id == message.user ? 'sender' : 'receiver'
    }
  },
    
  }
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.nav-link{
  background-color: #E2E2E2 !important;
  text-align: left !important;
  margin-top: 3px !important;
}

.messagerie{
  border-radius: 20px;
  min-height: 452px;
  position: relative;
  background-color:rgba(243, 243, 255, 1);
}
.nav-link .active{
  background-color: #3F3FA6 !important;
}

.section-dashboard{
  min-height: calc(100vh - 224px);
}
.infos{
  background-color: #3F3FA6;
  padding-top: 45px;
  padding-bottom: 45px;
  padding-left: 80px;
  padding-right: 80px;
}
.infos input{
  height: 116px;
  border-radius: 15px;
  text-align: center; 
}
.sender{
  background-color: #F37332;
  color: white;
  padding: 8px;
  border-radius: 12px;
  margin-bottom: 10px;
  max-width: 75%;
  align-self: flex-end;
  align-items: flex-end;
}
.receiver{
  background-color: #3F3FA6;
  padding: 8px;
  border-radius: 12px;
  color: white;
  margin-bottom: 10px;
  max-width: 75%;
  align-items: flex-end;
}
.col-6 div {
  padding-top: 4px;
  padding-bottom: 12px;

  background: white;
  border-radius: 20px !important;
  margin-top: 20px;
  box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%) !important;
}

.col-6 div input {
  border: 0px;
}

.col-6 div .sectionTitle{
  background-color: #F37332; border-radius: 12px; height:100%; color:white; margin:5px;
}

.input{
  margin-top: 20px;
  background-color: white !important;
}
a:hover{
  text-decoration: none;
}
a:active{
  text-decoration:none; 
}

.input{
  margin-top: 20px;
  background-color: white !important;
}

.skills{
  align-items: center;
    align-self: stretch;
    display: flex;
    gap: 10px;
    justify-content: center;
    position: relative;
    box-shadow: 0px !important;
    padding-top: 4px !important;
    padding-bottom: 12px !important;
    margin-top: 20px !important;
    border: 0px ;
}

.badg{
  align-items: center;
  background-color: lightgrey;
  color:black !important;
  border-radius: 5px;
  display: flex;
  gap: 10px;
  padding: 0px 10px;
  width: fit-content;
}

.message-container{
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  min-height: 400px;
  overflow-y: scroll;
  align-items: flex-start;
  padding: 20px;
}

</style>
