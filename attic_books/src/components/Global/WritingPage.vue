<template>
  <!-- <AddBook ></AddBook> -->
  <div class="flex items-center mb-6 my-4">
    <span class="p-1 text-gray-500 font-extrabold">{{ index =+ 1 }}</span>
    <div class="felx w-full h-48 border-gray-500 border-2">
      <div class="text-[12px] py-2 w-2/3 mx-auto">
        <h1 class="font-bold py-1 text-center">{{ item.title }}</h1>
        <p class="text-[8px] break-words">{{ item.body }}</p>
      </div>
    </div>
  </div>
</template>
<script>
// import { defineComponent } from '@vue/composition-api'
// import { props } from "cypress/types/bluebird";
import AddBook from "../AddBook.vue";
// import Page  from "../box/page.vue";

export default {
  name: "Writing",
  props: ['item' , 'index'],
  component: {
    AddBook,
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
