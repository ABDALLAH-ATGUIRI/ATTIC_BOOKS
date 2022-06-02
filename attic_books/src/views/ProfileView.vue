<!-- This example requires Tailwind CSS v2.0+ -->
<template>
   <nav>
    <AppHeader />
  </nav>
  <div>
    <div class="bg-gr">
      <img class="w-full h-48 " src="../assets/jonathan-borba-3w3FqbxG0nc-unsplash 1.jpg" alt="">
    </div>
  </div>
</template>

<script>

import BienvenuVue from "../components/Bienvenu.vue";
import CategoriesVue from "../components/Categories.vue";
import stareBook from "../components/starBooks.vue";
import Suggestions from "../components/Suggestions.vue";
import Favoris from "../components/Favoris.vue";
import Auteurs from "../components/Auteurs.vue";
import AppHeader from "../components/Global/Header.vue";
import Footer from "../components/Global/Footer.vue";

export default {
  name: "home",
  components: {
    BienvenuVue,
    CategoriesVue,
    stareBook,
    Suggestions,
    Favoris,
    Auteurs,
    AppHeader,
    Footer,
  },
};
</script>
