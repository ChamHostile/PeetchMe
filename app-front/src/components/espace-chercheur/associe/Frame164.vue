/****************************************** * src/components/Frame164.vue ******************************************/

<template>
  <div :class="[`frame-164-2`, className || ``]">
    <div class="dtail desktoptexte-12-regular">Détail</div>
    <polygon1 className="polygon-1-2-1" />
  </div>
</template>

<script>
import Polygon1 from './Polygon1.vue';
  export default {
    name: "Frame164",
    components: {
      Polygon1,
    },
    props: ["className", "polygon1Props"],
  };
</script>

<style>
  .frame-164-2 {
    align-items: center;
    display: flex;
    gap: 5px;
    position: relative;
    width: fit-content;
  }

  .dtail {
    color: grey;
    font-weight: 400;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .frame-164-2.frame-164-1 {
    justify-content: center;
  }
</style>