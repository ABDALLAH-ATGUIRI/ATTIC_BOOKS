<template>

      <div class="flex items-center mb-6 my-4">
        <span class="p-1 text-gray-500 font-extrabold">{{ number }}</span>
        <div class="felx w-full h-48 overflow-auto border-gray-500 border-2">
          <div class="text-[12px]  py-2 w-2/3 mx-auto">
            <h1 class="font-bold py-1 text-center">{{ title }}</h1>
            <p class="text-[8px] break-words h-full ">{{ body }}</p>
          </div>
        </div>
      </div>


</template>
<script>

export default {
  name: "Writing",
  props: ['title' , 'body', 'number'],
  component: {

  },

  data() {
    return {
      addPage: "",
      Page: [],
    };
  },
  beforeCreate() {},
  computed: {},
  mounted() {
    // this.titre = this.$store.state.title
  },
  methods: {
    Add() {
      // console.log($store.state.items);
    },
  },
  watch: {},
};
</script>
