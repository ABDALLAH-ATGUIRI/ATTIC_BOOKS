<template>
  <main>

    <section class="flex flex-col align-center justify-center lg:mt-20">
      <BienvenuVue />
    </section>
    <!-- <hr class="pt-20" /> -->
    <section class="flex flex-col align-center justify-center">
      <div class="p-16 mt-20 text-center text-3xl md:text-4xl font-semibold">
        <h1>Des articles >></h1>
      </div>
      <CategoriesVue />
    </section>
    <!-- <hr class="py-48" /> -->
    <section class="flex flex-col align-center justify-center">
     
      <div class="p-16 text-center text-3xl md:text-4xl font-semibold">
        <h1>Par Nos Stars >></h1>
      </div>
      <stareBook />
    </section>
    <section class="flex flex-col align-center justify-center">
   
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-semibold">
        <h1>Par nos suggestions >></h1>
      </div>
      <Suggestions />
    </section>
    <section class="flex flex-col align-center justify-center">
     
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-semibold">
        <h1>Vos favoris >></h1>
      </div>
      <Favoris />
    </section>
    <section>
      
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-bold">
        <h1>Vos favoris >></h1>
      </div>
      <Auteurs />
    </section>
  </main>
</template>
<style scoped>

</style>

<script>
import BienvenuVue from "../components/Bienvenu.vue";
import CategoriesVue from "../components/Categories.vue";
import stareBook from "../components/starBooks.vue";
import Suggestions from "../components/Suggestions.vue";
import Favoris from "../components/Favoris.vue";
import Auteurs from "../components/Auteurs.vue";


export default {
  name: "home",
  components: {
    BienvenuVue,
    CategoriesVue,
    stareBook,
    Suggestions,
    Favoris,
    Auteurs,
  },
};
</script>
