/****************************************** * src/components/DefaultForm2.vue ******************************************/

<template>
  <article class="default-form-4">
    <div class="frame-260-1">
      <div class="frame-167-1">
        <div class="text-2desktoptexte-18-regular">{{ children }}</div>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    name: "DefaultForm2",
    props: ["children"],
  };
</script>

<style>
  .default-form-4 {
    align-items: flex-start;
    display: flex;
    flex: 1;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    position: relative;
  }

  .frame-260-1 {
    align-items: flex-start;
    align-self: stretch;
    background-color: lightgrey;
    border-radius: 5px;
    display: flex;
    gap: 20px;
    padding: 10px 22px 10px 20px;
    position: relative;
  }

  .frame-167-1 {
    align-items: center;
    display: flex;
    gap: 20px;
    position: relative;
    width: fit-content;
  }

  .text-2 {
    color: grey;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }
</style>