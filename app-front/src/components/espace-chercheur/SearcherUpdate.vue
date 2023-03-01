<template>
  <div class="paramtre">
    <div class="frame-177">
      <a href="" class="frame-177-1" @click.prevent="changeTab(1)">
        <div href ="" class="information-personnel desktoptexte-14-gris" >Information personnel</div>
      </a>
      <a href="" @click.prevent="changeTab(2)" class="frame-26">
        <div class="information-de-facturation desktoptexte-14-gris" >Information de facturation</div>
      </a>
      <a href="" @click.prevent="changeTab(3)" class="frame-26">
        <div class="notification desktoptexte-14-gris" >Notification</div>
      </a>
      <a href="" @click.prevent="changeTab(4)" class="frame-26">
        <div class="grer-le-compte desktoptexte-14-gris" >Gérer le compte</div>
      </a>
    </div>
    <div class="frame-264" v-if="tab==1">
      <div class="frame-290">
        <div class="frame-2">
          <div class="frame-177-2">
            <div class="frame-288">
              <div class="information-personnel-1 texte-18-bold">Information personnel</div>
              <p class="vous-pouvez-modifier desktoptexte-14-gris">
                Vous pouvez modifier vos informations personnels
              </p>
            </div>
            <a href="" @click.prevent="modeEdit()" style="text-decoration: none; color:#9F9F9F;" v-if="edit == 0"><img src="../../assets/img/modifier.svg">  Modifier</a>
            <div v-else>
              <a href="" @click.prevent="cancelEdit()" class="btn btn-secondary text-white" style="text-decoration: none;"><img src="../../assets/img/cancel.svg">  Annuler</a>
              <a href="" @click.prevent="editAccount()" class="btn btn-primary text-white" style="text-decoration: none;"><img src="../../assets/img/confirm.svg">  Sauvegarder</a>
            </div>
          </div>
          <hr style="height:2px; color:black">

        </div>
        <div class="frame-2">
          <div class="frame-265">
            <default-form text1="Votre nom et prénom" text2="Nom" />
            <default-form2 children="Prénom" />
          </div>
          <default-form
            text1="Adresse email"
            text2="JeanCastaldi@gmail.com"
            className="default-form-1"
          />
          <default-form
            text1="Mot de passe"
            text2="••••••••••"
            className="default-form-1"
          />
          <default-form text1="Âge" text2="129 ans" className="default-form-2" />
          <div class="frame-266">
            <default-form text1="Code postal" text2="75016, PARIS" />
            <default-form text1="Pays" text2="France" />
          </div>
          <default-form
            text1="Numéro de téléphone"
            text2="+33 06 34 26 83 21"
            className="default-form-1"
          />
        </div>
      </div>
    </div>
    <div class="frame-264" v-if="tab==2">
      <div class="frame-288">
        <div class="information-personnel-1 texte-18-bold">Information de facturation</div>
        <p class="vous-pouvez-modifier desktoptexte-14-gris">
          Vous n'avez pas d'information de facturation pour le moment
        </p>
      </div>
      <hr> 
    </div>
    <div class="frame-264" v-if="tab==3">
      <div class="frame-288">
        <div class="information-personnel-1 texte-18-bold">Information de facturation</div>
        <p class="vous-pouvez-modifier desktoptexte-14-gris">
          Vous pouvez gérer vos notification PeetchMe
        </p>
      </div>
      <div class="frame-2">
        <span class="text-dark" style="font-weight: 500;">Recevoir les notifications par mail</span>
        <ToggleButton/>
      </div>
      <div class="frame-2">
        <span class="text-dark" style="font-weight: 500;">Alertes pour les nouvelles fonctionnalités</span>
        <ToggleButton/>
      </div>
      <div class="frame-2">
        <span class="text-dark" style="font-weight: 500;">Alertes pour les suggestions </span>
        <ToggleButton/>
      </div>
      <div class="frame-2">
        <span class="text-dark" style="font-weight: 500;">Notifications des messages</span>
        <ToggleButton/>
      </div>
      <hr> 
    </div>
    <div class="frame-264" v-if="tab==4">
      <div class="frame-290">
        <div class="frame-2">
          <div class="frame-177-2">
            <div class="frame-288">
              <div class="information-personnel-1 texte-18-bold">Information essentielle</div>
              <p class="vous-pouvez-modifier desktoptexte-14-gris">
                Vous pouvez modifier vos informations essentielles
              </p>
            </div>
            <a href="" @click.prevent="modeEdit()" style="text-decoration: none; color:#9F9F9F;" v-if="edit == 0"><img src="../../assets/img/modifier.svg">  Modifier</a>
            <div v-else>
              <a href="" @click.prevent="cancelEdit()" class="btn btn-secondary text-white" style="text-decoration: none;"><img src="../../assets/img/cancel.svg">  Annuler</a>
              <a href="" @click.prevent="editAccount()" class="btn btn-primary text-white" style="text-decoration: none;"><img src="../../assets/img/confirm.svg">  Sauvegarder</a>
            </div>
          </div>
          <hr style="height:2px; color:black">

        </div>
        <div class="frame-2">
          <default-form text1="Âge" text2="129 ans" className="default-form-2" />
          <div class="frame-266">
            <default-form text1="Code postal" text2="75016, PARIS" />
            <default-form text1="Pays" text2="France" />
          </div>
          <default-form
            text1="Numéro de téléphone"
            text2="+33 06 34 26 83 21"
            className="default-form-1"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Modification from './Modification.vue';
import DefaultForm from './DefaultForm.vue';
import DefaultForm2 from './DefaultForm2.vue';
import ToggleButton from '../ToggleButton';
  export default {
    name: "SearcherUpdateComponent",
    components: {
      Modification,
      DefaultForm,
      DefaultForm2,
      ToggleButton
    },
    data() {
      return {
        tab: 1,
        edit: 0
      }
    },
    methods: {
      changeTab(tabNum) {
        console.log(tabNum)
        return this.tab = tabNum;
      },
      modeEdit() {
      console.log(this.edit)
      if (this.edit !== 1) {
        return this.edit = 1
      }
    },
    cancelEdit() {
      console.log(this.edit)
      if (this.edit !== 0) {
        return this.edit = 0
      }
    } 
  },
  };
</script>

<style>
  .paramtre {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    width: fit-content;
  }

  .frame-177 {
    align-items: flex-start;
    display: flex;
    gap: 20px;
    justify-content: center;
    position: relative;
    width: fit-content;
  }

  .frame-177-1 {
    align-items: flex-start;
    background-color: white;
    border-radius: 20px 20px 0px 0px;
    display: flex;
    gap: 10px;
    padding: 20px 15px;
    position: relative;
    width: fit-content;
  }

  .information-personnel,
  .information-de-facturation,
  .notification,
  .grer-le-compte {
    color: black;
    font-weight: 400;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .frame-26 {
    align-items: flex-start;
    border-radius: 20px 20px 0px 0px;
    box-shadow: 0px 0px 25px 
#0000001a;
    display: flex;
    gap: 10px;
    padding: 20px 15px;
    position: relative;
    width: fit-content;
  }

  .frame-264 {
    align-items: center;
    background-color: white;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 30px 100px 50px;
    position: relative;
    width: 900px;
  }

  .frame-290 {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
    width: 631px;
  }

  .frame-2 {
    align-items: flex-start;
    align-self: stretch;
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
  }

  .frame-177-2 {
    align-items: flex-end;
    align-self: stretch;
    display: flex;
    justify-content: space-between;
    position: relative;
  }

  .frame-288 {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    gap: 5px;
    position: relative;
    width: fit-content;
  }

  .information-personnel-1 {
    color: black;
    font-weight: bold;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .vous-pouvez-modifier {
    color: grey;
    font-weight: 400;
    line-height: normal;
    position: relative;
    width: fit-content;
  }

  .line-15 {
    align-self: stretch;
    height: 1px;
    min-width: 631px;
    object-fit: cover;
    position: relative;
  }

  .frame-265 {
    align-items: flex-end;
    align-self: stretch;
    display: flex;
    gap: 20px;
    position: relative;
  }

  .frame-266 {
    align-items: flex-start;
    align-self: stretch;
    display: flex;
    gap: 20px;
    position: relative;
  }

  
:root {
  --black-2: 
rgba(0, 0, 0, 1);
  --black: 
rgba(51, 51, 51, 1);
  --bleu: 
rgba(63, 63, 166, 1);
  --grey-fonc: 
rgba(159, 159, 159, 1);
  --grey: 
rgba(225, 225, 225, 1);
  --orange: 
rgba(243, 115, 50, 1);
  --f4f4ff: 
rgba(243, 243, 255, 1);
  --white: 
rgba(255, 255, 255, 1);

  --font-size-xs: 12px;
  --font-size-s: 14px;
  --font-size-m: 16px;
  --font-size-l: 18px;
  --font-size-xl: 32px;

  --font-family-manrope: "Manrope";
}



.desktoptexte-18-regular {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-l);
  letter-spacing: 0px;
  font-weight: 500;
  font-style: normal;
}
.desktoptexte-12-regular {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-xs);
  letter-spacing: 0px;
  font-weight: 400;
  font-style: normal;
}
.desktoptexte-18-semibold {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-l);
  letter-spacing: 0px;
  font-weight: 600;
  font-style: normal;
}
.desktoptexte-16-regular {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-m);
  letter-spacing: 0px;
  font-weight: 500;
  font-style: normal;
}
.desktoptexte-14-gris {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-s);
  letter-spacing: 0px;
  font-weight: 400;
  font-style: normal;
}
.desktoptexte-32-bold {
  font-family: var(--font-family-manrope);
  font-size: var(--font-size-xl);
  letter-spacing: 0px;
  font-weight: 700;
  font-style: normal;
}
</style>




