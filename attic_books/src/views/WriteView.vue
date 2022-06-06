<template>
  <HeaderBooK></HeaderBooK>
  <div
    class="w-1/4 top-0 z-4 fixed bg-slate-100 border-1 font-medium border-black flex flex-col divide-x-16"
  >
    <div class="flex h-36 w-full">
      <div class="flex justify-around items-center w-full self-end pb-2">
        <button
          class="font-semibold border-2 bg-red-600 active:bg-red-800 rounded-sm text-white p-2 text-medium font-bold px-8 rounded-md"
        >
          Annuler
        </button>
        <button
          class="font-semibold border-2 bg-blue-600 active:bg-blue-800 rounded-sm text-white p-2 text-medium font-bold px-8 rounded-md"
        >
          Enregistré
        </button>
      </div>
    </div>
    <div class="px-4 pb-24 w-full h-screen overflow-y-scroll shadow-xl">
      <div>
        <WritingPageVue
          v-bind:item="item"
          v-bind:index="index"
          v-for="(item, index) in $store.state.items"
          :key="index"
        ></WritingPageVue>
        {{ data }}
      </div>
      <div class="w-full h-12 mb-20 flex items-center justify-center">
        <img
          src="../assets/icons/plus.png"
          class="w-10 hover:w-12 duration-300 ease-in-out"
          @click="Add"
          alt="Add page"
        />
      </div>
    </div>
  </div>
  <Page></Page>
</template>
<script>
import WritingPageVue from "../components/Global/WritingPage.vue";
import Page from "../components/box/page.vue";
import HeaderBooK from "../components/Global/HeaderBook.vue";
export default {
  name: "WritingPage",

  data() {
    return {
      title: "",
      body: "",
      data: "",
    };
  },
  components: {
    WritingPageVue,
    Page,
    HeaderBooK,
  },
  data() {},
  setup() {},
};
</script>

<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
