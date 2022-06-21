<template>
  <AppHeader></AppHeader>
  <div
    class="w-full mt-1 flex flex-col items-center justify-evenly py-8 bg-sky-600 h-auto"
  >
    <div class="lg:px-32 pb-8 md:pl-10 md:self-start block">
      <h1 class="font-bold text-2xl text-white">Trouvez votre livre</h1>
    </div>
    <div
      class="lg:block rounded-md w-11/12 lg:w-5/6 bg-white bottom-10 mx-auto"
    >
      <SearchBar class=""></SearchBar>
    </div>
  </div>
  <div
    class="my-24 w-5/6 mx-auto grid gap-16 md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-2"
  >
    <div v-for="book in this.$store.state.Books" :key="book.index">
      <books
        :title="book.titre_book"
        :coverture="book.couverture"
        :category="book.category_book"
        :Id_book="book.Id_book"
        :classification="book.classification"
        :description="book.Description"
        :profile="book.pro_image"
        :Author="book.f_name + '&nbsp;-&nbsp;' + book.l_name"
        class="h-full self-center"
      ></books>
    </div>
  </div>
  <div>
    <Footer></Footer>
  </div>
</template>

<script>
import AppHeader from "../components/Global/Header.vue";
import SearchBar from "../components/box/bar-search.vue";
import books from "../components/box/book.vue";
import Footer from "../components/Global/Footer.vue";
import axios from "axios";
import { watch } from "@vue/runtime-core";
export default {
  name: "Search",
  components: {
    AppHeader,
    SearchBar,
    books,
    Footer,
  },
  data() {
    return {
      Books: this.$store.state.Book,
    };
  },

};
</script>
