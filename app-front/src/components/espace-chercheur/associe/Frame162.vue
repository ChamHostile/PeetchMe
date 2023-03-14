/****************************************** * src/components/Frame162.vue ******************************************/

<template>
  <div class="frame-162 desktoptexte-16-regular">
    <div class="name">Dylan</div>
    <div class="webdesigner">Webdesigner</div>
  </div>
</template>

<script>
  export default {
    name: "Frame162",
  };
</script>

<style>
  .frame-162 {
    align-items: flex-start;
    background-color: grey;
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

  .name {
    color: black;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .webdesigner {
    color: rgba(243, 115, 50, 1);
    font-weight: 500;
    line-height: normal;
    position: relative;
    width: fit-content;
  }
</style>