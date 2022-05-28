<template>
  <div class="flex w-full  h-auto  lg:h-[400px] lg:mt-10">
    <div class="bg-sky-500 relative w-5/6 rounded-lg mx-auto">
      <div class="hidden lg:flex relative w-1/2">
        <img
          class="absolute max-w-1/2 left-[112%] -top-16"
          src="../assets/image 1.png"
          alt=""
        />
      </div>
      <div class="hidden lg:block">
        <search></search>
      </div>
      <div class="w-full z-1 h-full relative">
        

        <div
          class="top-20 lg:w-2/3 text-white text-xl pt-20 lg:px-20 px-10"
        >
          <h2 class="font-bold text-4xl lg:text-3xl pb-8">
            Bienvenue à ATTIC BOOKS
          </h2>
          <p>
            lire davantage est le meilleur moyen d’apprendre de nouvelles
            choses, de développer des connaissances et de trouver de nouvelles
            idées
          </p>
        </div>
        <img class="w-full lg:hidden" src="../assets/Asset-2.png" alt="" />

      </div>
    </div>
  </div>
</template>

<script>
import search from "../components/box/bar-search.vue";

export default {
  name: "home",
  components: {
    search,
  },
};
</script>

<style lang="css" scoped></style>
