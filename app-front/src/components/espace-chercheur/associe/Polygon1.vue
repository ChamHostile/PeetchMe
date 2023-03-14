src/components/Polygon1.vue ******************************************/

<template>
  <div :class="[`polygon-1-6`, className || ``]">
    <img class="polygon-1-1" src="polygon-1.svg" alt="Polygon 1" />
  </div>
</template>

<script>
  export default {
    name: "Polygon1",
    props: ["className"],
  };
</script>

<style>
  .polygon-1-6 {
    align-items: flex-end;
    display: flex;
    height: 10px;
    left: 123px;
    min-width: 10px;
    padding: 0.3px 0.7px;
    position: relative;
    top: 13px;
  }

  .polygon-1-1 {
    height: 7px;
    width: 9px;
  }

  .polygon-1-6.polygon-1-2,
  .polygon-1-6.polygon-1-2-1 {
    align-items: unset;
    display: unset;
    height: 12px;
    left: unset;
    min-width: 12px;
    padding: unset;
    top: unset;
  }

  .polygon-1-6.polygon-1-2-1 .polygon-1-1,
  .polygon-1-6.polygon-1-2 .polygon-1-1 {
    height: 9px;
    left: 1px;
    position: absolute;
    top: 3px;
    width: 10px;
  }

  .polygon-1-6.polygon-1-4 {
    height: 11px;
    min-width: 12px;
    position: relative;
  }

  .polygon-1-6.polygon-1-4 .polygon-1-1 {
    height: 8px;
    left: 1px;
    position: absolute;
    top: 3px;
    width: 10px;
  }
</style>