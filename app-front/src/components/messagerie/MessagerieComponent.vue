<template>
  <div class="container">
  <div class="row">
    <div class="col-4 messagerie">
     <a href="" class="row mt-3">
      <img src="https://via.placeholder.com/104" style="width:100%; height:100%; border-radius:12px !important;" class="col-4"/>
      <div class="col-7 text-left">
      <p>Mikaelle</p>
      <p style="color:rgb(243, 115, 50);">Chef de projet</p>
      </div>
      <hr>
     </a> 
    </div>

    <div class="col-7 messagerie ml-5" style="position:relative;">
    <div class="" style="min-height: 300px;">
      
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
  props: ['chatrooms'], 
  data() {
    return {
      store,
      project: {},
      user: {},
      skills:  [],
      skillsId: [],
      bibliActive: 0,
      currentUser: JSON.parse(localStorage.getItem("user")),
    }
  },
  created() {
    // let self = this
    //   this.store.dispatch("getFullProject", {
    //     projectId: self.projectId
    //   }).then( (response) => {
    //       self.project = response.data.project
    //        self.skills = response.data.skills
    //       self.user = response.data.user
    //     }) 
  }, 
  methods: {
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
</style>
