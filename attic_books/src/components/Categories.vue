<template>
  <div class="overflow-x-scroll overflow-y-hidden  w-4/5 mx-auto flex items-center">
    <div
      class="gap-24 flex justify-evenly items-center h-80  "
    >
      <router-link to="/Search?cate=POÉSIE">
        <div
          class="w-64 lg:ml-0 align-center justify-center flex-col justify-center"
        >
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164307.png"
            alt=""
          />
          <span class="block text-center font-bold text-xl py-8">POÉSIE</span>
        </div>
      </router-link>
      <router-link to="/Search?cate=FICTION HISTORIQUE"
        ><div class="w-64 flex-col justify-center">
          <img
            class="w-full h-full p-2"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164326.png"
            alt=""
          />
          <span class="block text-center font-bold text-xl py-8"
            >FICTION HISTORIQUE</span
          >
        </div>
      </router-link>
      <router-link to="/Search?cate=CLASSIQUE">
        <div class="w-64 flex-col  flex justify-center">
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164344.png"
            alt=""
          />
          <span class="block text-center font-bold text-xl py-8"
            >CLASSIQUE</span
          >
        </div>
      </router-link>
      <router-link to="/Search?cate=AMOUR">
        <div class="w-64 flex-col flex justify-center">
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164358.png"
            alt="HORREUR"
          />
          <span class="block text-center font-bold text-xl py-8">AMOUR</span>
        </div>
      </router-link>
      <router-link to="/Search?cate=DRAME">
        <div class="w-64 flex-col flex justify-center">
          <img
            class="w-full h-full"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164413.png"
            alt="DRAME"
          />
          <span class="block text-center font-bold text-xl py-8">DRAME</span>
        </div>
      </router-link>

      <router-link to="/Search?cate=HORREUR">
        <div class="w-64 flex-col flex justify-center">
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164443.png"
            alt="HORREUR"
          />
          <span class="block text-center font-bold text-xl py-8">HORREUR</span>
        </div>
      </router-link>
      <router-link to="/Search?cate=ARTS">
        <div class="w-64 flex-col flex justify-center">
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164510.png"
            alt="ARTS"
          />
          <span class="block text-center font-bold text-xl py-8">ARTS</span>
        </div>
      </router-link>
      <router-link to="/Search?cate=LITTÉRATURE D'AFFAIRES">
        <div class="w-64 flex-col flex justify-center">
          <img
            class="w-full h-full px-10 py-"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164538.png"
            alt=""
          />
          <span class="block text-center font-bold text-xl py-8"
            >LITTÉRATURE D'AFFAIRES</span
          >
        </div>
      </router-link>
      <router-link to="/Search?cate=CONTE DE FÉE">
        <div
          class="w-64 flex-col lg-mr-0 mr-5 flex justify-center"
        >
          <img
            class="w-full h-full p-6"
            src="../assets/Categorie/Capture d’écran 2022-05-27 164603.png"
            alt=""
          />
          <span class="block text-center font-bold text-xl py-8"
            >CONTE DE FÉE</span
          >
        </div>
      </router-link>
    </div>
  </div>
</template>
<script>
export default {
  methods: {},
};
</script>
<style lang="css" scoped>
.overflow-x-scroll::-webkit-scrollbar {
  display: none;
}
</style>
