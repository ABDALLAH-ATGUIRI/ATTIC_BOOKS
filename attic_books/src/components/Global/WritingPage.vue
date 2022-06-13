<template>
  <div class="flex items-center mb-6 my-4">
    <span class="p-1 text-gray-500 font-extrabold">{{ number }}</span>
    <div class="felx w-full h-48 overflow-y-auto border-gray-500 border-2 active:border-blue-500">
      <div class="text-[12px] py-2 w-2/3 mx-auto">
        <h1 class="font-bold py-1 break-words text-center">{{ title }}</h1>
        <p class="text-[8px] break-words h-full">{{ body }}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Writing",
  props: ["title", "body", "number"],
  component: {},

  data() {
    return {
      addPage: "",
      Page: [],
    };
  },
};
</script>
<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>

