<template>
  <Page></Page>
  <!-- <AddBook ></AddBook> -->
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
        <div v-html="Pages"></div>
      </div>

      <div class="w-full h-12 mb-20 flex items-center justify-center">
        <img
          src="../../assets/icons/plus.png"
          class="w-10 hover:w-12 duration-300 ease-in-out"
          @click="Add"
          alt="Add page"
        />
      </div>
    </div>

    <!-- <div class="bg-white w-24 h-24"></div> -->
  </div>
</template>
<script>
// import { defineComponent } from '@vue/composition-api'
import AddBook from "../AddBook.vue";
import Page from "../box/page.vue";

export default {
  name: "",
  component: {
    AddBook,
    Page,
  },

  data() {
    return {
      addPage: "",
      Pages: [],
      ind: 1,
    };
  },
  mounted() {},
  setup() {},
  components: { AddBook, Page },
  methods: {
    Add() {
      this.addPage = `<div  class="flex items-center mb-6 my-4">
            <span class="p-1 text-gray-500 font-extrabold">${this.ind}</span>
            <div  class="felx w-full h-48 border-gray-500 border-2" >
            <div class="text-[12px] py-2 w-2/3 mx-auto  ">
            <h1 class="font-bold py-1 text-center">ATTIC BOOKS</h1>
            <p class="text-[8px] break-words">Le contexte archéologique de la trouvaille est très mal connu, les archéologues se concentrant alors sur l'objet découvert, et l’on ne sait pas grand chose de l'édifice qui la contenait, même s'il est permis de penser qu'il peut s'agir d'une domus vu sa situation non loin d'un secteur résidentiel mis en valeur de nos jours au sein d'un parc archéologique.</p>
            </div>
            </div>
          </div>`;
      this.Pages += this.addPage;
      this.ind++;
    },
  },
};
</script>
<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
