<template>
  <div class="associ2">
    <div class="frame-161">
      <div class="group-51-1">
        <div class="overlap-group-3">
          <div class="frame-162-1 desktoptexte-16-regular">
            <div class="place">{{ prenom }}</div>
            <div class="cheffe-de-projet">{{ metier ? metier : 'Sans métier' }}</div>
          </div>
          <div class="group-163-1">
            <img src="https://via.placeholder.com/104" class="femme1-1">
          </div>
        </div>
      </div>
      <frame164
        className="polygon-1-4"
      />
      <p class="hello-vous-avez-be desktoptexte-16-regular">{{ description }}</p>
    </div>
  </div>
</template>

<script>
import Frame164 from './Frame164.vue';
  export default {
    name: "AssocieComponent",
    components: {
      Frame164,
    },
    props: ["prenom", "metier","description", "frame164Props"],
  };
</script>

<style>
  .associ2 {
    align-items: center;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 5px 20px 
#0000001a;
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    padding: 20px;
    position: relative;
    width: fit-content;
  }

  .frame-161 {
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 15px;
    justify-content: center;
    position: relative;
    width: fit-content;
  }

  .group-51-1 {
    height: 104px;
    min-width: 268.25px;
    position: relative;
  }

  .overlap-group-3 {
    height: 104px;
    position: relative;
    width: 268px;
  }

  .frame-162-1 {
    align-items: flex-start;
    background-color: lightgrey;
    border-radius: 0px 91px 91px 0px;
    display: flex;
    flex-direction: column;
    gap: 2px;
    left: 82px;
    padding: 18px 32px;
    position: absolute;
    top: 11px;
    width: fit-content;
  }

  .place {
    color: black;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .cheffe-de-projet {
    color: rgba(243, 115, 50, 1);
    font-weight: 500;
    line-height: normal;
    position: relative;
    width: fit-content;
  }

  .group-163-1 {
    align-items: flex-start;
    background-color: white;
    border-radius: 52px;
    display: flex;
    gap: 1028px;
    height: 104px;
    justify-content: flex-end;
    left: 0;
    min-width: 104px;
    position: absolute;
    top: 0;
  }

  .femme1-1 {
    align-self: center;
    height: 98px;
    object-fit: cover;
    width: 98px;
    border-radius: 52px;
  }

  .ellipse-4-1 {
    height: 98px;
    margin-top: -5017px;
    width: 98px;
    z-index: 4;
  }

  .hello-vous-avez-be {
    color: black;
    font-weight: 300;
    height: 65px;
    line-height: normal;
    position: relative;
    width: 350px;
  }
</style>
