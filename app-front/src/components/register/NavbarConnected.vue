<template>
    <div>
        <b-row align-h="between shadow-sm" style="overflow-x:hidden !important;">
            <b-navbar variant="light" type="light" class="col-12">
                <b-navbar-brand href="#" class="mx-5 col-sm-2 text-center m-0"><img src="../../assets/img/Logo_web.png" class="sm-img"></b-navbar-brand>
                <div class="col-3">
                    <b-row align-h="between">
                        <b-navbar-item class="text-dark mx-auto
                        ">Entreprise</b-navbar-item>
                        <b-navbar-item class="text-dark mx-auto
                        ">Services</b-navbar-item>
                        <b-navbar-item ar-item class="text-dark mx-auto
                        ">Blog</b-navbar-item>
                    </b-row>
                </div>
                <div class="offset-4 col-sm-1">
                    <img src="../../assets/img/blondefemale.png" class="rounded-circle sm-img">
                </div>
            </b-navbar>
        </b-row>
    </div>
</template>
<script>
export default {
  name: 'NavbarConnected',
  data () {
  }
}
</script>
<style>
  @import '../../assets/css/home.css';
</style>
