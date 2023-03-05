/****************************************** * src/components/DefaultForm.vue ******************************************/

<template>
  <article :class="[`default-form-3`, className || ``]">
    <div class="textdesktoptexte-16-regular">{{ text1 }}</div>
    <div class="frame-260">
      <div class="frame-167">
        <div class="text-1desktoptexte-18-regular">{{ text2 }}</div>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    name: "SearcherUpdate",
    props: ["text1", "text2", "className"],
  };
</script>

<style>
  .default-form-3 {
    align-items: flex-start;
    display: flex;
    flex: 1;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    position: relative;
  }

  .text {
    color: black;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .frame-260 {
    align-items: flex-start;
    align-self: stretch;
    background-color: lightgray;
    border-radius: 5px;
    display: flex;
    gap: 20px;
    padding: 10px 22px 10px 20px;
    position: relative;
  }

  .frame-167 {
    align-items: center;
    display: flex;
    gap: 20px;
    position: relative;
    width: fit-content;
  }

  .text-1 {
    color: grey;
    font-weight: 500;
    line-height: normal;
    margin-top: -1px;
    position: relative;
    width: fit-content;
  }

  .default-form-3.default-form-1 {
    align-self: stretch;
    flex: unset;
  }

  .default-form-3.default-form-2 {
    flex: unset;
    width: 631px;
  }
</style>
