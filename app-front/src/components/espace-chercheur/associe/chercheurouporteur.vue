<template>

<div class="frame-232">
  <div class="group-23">
    <div class="overlap-group">
      <img
        class="happy-co-workers-close-window-1"
        src="../../../assets/img/coworkers.png"
        alt="happy-co-workers-close-window 1"
      />
      <div class="rectangle-60"></div>
      <p class="vous-tes-porteur-de-projet desktoptexte-20-bold">
        <span class="span0 desktoptexte-20-bold">Vous êtes<br /></span
        ><span class="span1 desktoptexte-32-bold">porteur de projet ?</span>
      </p>
      <div class="frame-229">
        <p class="profitez-de-la-plate desktoptexte-18-regular">Profitez de la plateforme pour déposez votre pitch de présentation de projet et sélectionnez vos profils d’associés coup de cœur parmi une liste en un seul clic.</p>
        <button class="btn text-white" style="background-color:#3F3FA6 !important;">Je suis porteur de projet</button>
      </div>
    </div>
  </div>
  <div class="group-23">
    <div class="overlap-group1">
      <img
        class="happy-co-workers-close-window-1-1"
        src="../../../assets/img/coworkers.png"
        alt="happy-co-workers-close-window 1"
      />
      <div class="rectangle-60-1"></div>
      <p class="vous-tes-chercheur-de-projet desktoptexte-20-bold">
        <span class="span0 desktoptexte-20-bold">Vous êtes<br /></span
        ><span class="span1 desktoptexte-32-bold">chercheur de projet ?</span>
      </p>
      <div class="frame-230">
        <p class="vous-visionnez-les-p desktoptexte-18-regular">Vous visionnez les pitchs et entrez directement en contact avec le porteur du projet qui vous intéresse.</p>
        <button class="btn text-white" style="background-color:#3F3FA6 !important;">Je suis chercheur de projet</button>
      </div>
    </div>
  </div>
</div>

</template>

<script>
import Frame164 from './Frame164.vue';
  export default {
    name: "TypeComponent",
    components: {
      Frame164,
    },
    props: ["user"],
    data() {
      return {
        
      }
    },
    methods: {
      setUserType(type) {
      const self = this
      console.log(this.user)
      console.log(this.user.id)
      this.store.dispatch("setUserType", {
        id: this.user.id,
        type: type
      }).then(function (response) {
          console.log(response)
          if (response.status === 200 ) {
            this.store.dispatch("getUserFull", {
              id: self.user.id
            })
            self.$router.go()
          }  
        });
      }
    },
  };
</script>

<style>
.happy-co-workers-close-window-1 {
    height: 255px;
    left: 1px;
    object-fit: cover;
    position: absolute;
    top: 0;
    width: 515px;
  }

  .rectangle-60 {
    background: linear-gradient(180deg, 
rgba(51, 51, 51, 0) 0%, 
rgb(51, 51, 51) 73.23%);
    height: 315px;
    left: 1px;
    position: absolute;
    top: 52px;
    width: 514px;
  }

  .vous-tes-porteur-de-projet {
    color: 
transparent;
    font-weight: 700;
    left: 0;
    line-height: normal;
    position: absolute;
    text-align: center;
    top: 69px;
    width: 517px;
  }

  .span0 {
    color: rgba(243, 115, 50, 1);
;
  }

  .span1 {
    color: white;
  }

  .frame-229 {
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 40px;
    justify-content: center;
    left: 60px;
    position: absolute;
    top: 179px;
    width: 391px;
  }

  .profitez-de-la-plate,
  .vous-visionnez-les-p {
    align-self: stretch;
    color: white;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    text-align: center;
  }

  .overlap-group1 {
    height: 340px;
    position: relative;
    width: 515px;
  }

  .happy-co-workers-close-window-1-1 {
    height: 295px;
    left: 0;
    object-fit: cover;
    position: absolute;
    top: 0;
    width: 515px;
  }

  .rectangle-60-1 {
    background: linear-gradient(180deg, 
rgba(51, 51, 51, 0) 0%, 
rgb(51, 51, 51) 57.86%);
    height: 243px;
    left: 0;
    position: absolute;
    top: 52px;
    width: 515px;
  }

  .vous-tes-chercheur-de-projet {
    color: 
transparent;
    font-weight: 700;
    left: 64px;
    line-height: normal;
    position: absolute;
    text-align: center;
    top: 69px;
    width: 386px;
  }

  .frame-230 {
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 40px;
    justify-content: center;
    left: 59px;
    position: absolute;
    top: 181px;
    width: 391px;
  }

  .flex-row-2 {
    align-items: flex-start;
    display: flex;
    gap: 22px;
    height: 303px;
    margin-left: 110px;
    min-width: 1180px;
    position: relative;
  }

  .flex-col-3 {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-height: 223px;
    position: relative;
    width: 579px;
  }

  .flex-col-4 {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    min-height: 455px;
    position: relative;
    width: 1440px;
  }
</style>