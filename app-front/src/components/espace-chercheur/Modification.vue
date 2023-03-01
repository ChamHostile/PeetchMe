/****************************************** * src/components/Modification.vue ******************************************/

<template>
  <div class="modification">
    <img class="icne-modifier" src="ic-ne-modifier-2.svg" alt="icne | modifier" />
    <div class="modifierdesktoptexte-16-regular">Modifier</div>
  </div>
</template>

<script>
  export default {
    name: "Modification",
  };
</script>

<style>
  .modification {
    align-items: center;
    display: flex;
    gap: 10px;
    position: relative;
    width: fit-content;
  }

  .icne-modifier {
    height: 26px;
    min-width: 26px;
    position: relative;
  }

  .modifier {
    color: grey;
    font-weight: 500;
    line-height: normal;
    position: relative;
    width: fit-content;
  }
</style>