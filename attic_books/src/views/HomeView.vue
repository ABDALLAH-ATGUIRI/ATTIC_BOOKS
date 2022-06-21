<template>
  <nav>
    <AppHeader />
    <div class="drop-shadow-lg bg-sky-600 relative z-0 lg:hidden">
      <search></search>
    </div>
  </nav>
  <main>
    <section  class="flex flex-col align-center justify-center lg:mt-28 z-40">
      <BienvenuVue />
    </section>
    <!-- <hr class="pt-20" /> -->
    <section class="flex pb-12 pt-36 flex-col align-center justify-center">
      <CategoriesVue />
    </section>
    <!-- <hr class="py-48" /> -->
    <section class="flex flex-col align-center justify-center">
      <div class="p-16 text-center text-3xl md:text-4xl font-semibold">
        <h1>Nos Stars >></h1>
      </div>
      <div
        class="bg-sky-600 w-5/6 rounded-xl mx-auto flex flex-col h-screen snap-y snap-mandatory scroll-smooth lg:h-96 p-8 overflow-x-hidden hide-scroll-bar items-center"
      >
        <div v-for="book in this.Books" :key="book.index">
          <stareBook
            :title="book.titre_book"
            :coverture="book.couverture"
            :category="book.category_book"
            :Id_book="book.Id_book"
            :classification="book.classification"
            :description="book.Description"
            :profile="book.pro_image"
            :Author="book.f_name + '&nbsp;-&nbsp;' + book.l_name"
            :Id_user="book.Id_user"
          />

          <h1 class="text-3xl text-black">{{ book.index }}</h1>
        </div>
      </div>
    </section>

    <section class="flex flex-col align-center justify-center">
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-semibold">
        <h1>Nos suggestions >></h1>
      </div>
      <Suggestions />
    </section>
    <section class="flex flex-col align-center justify-center">
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-semibold">
        <h1>Vos favoris >></h1>
      </div>
      <Suggestions />
      <!-- <Favoris /> -->
    </section>
    <section v-if="id_user">
      <div class="py-16 w-full text-center text-3xl md:text-4xl font-bold">
        <h1>Nos auteurs >></h1>
      </div>
      <div
        class="gap-20 grid sm:grid-cols-2 lg:grid-cols-4 w-11/12 align-center mx-auto"
      >
        <div v-for="author in Authors" :key="author.id">
          <Auteurs
            :author_id="author.id_utilisateur"
            :author_pro="author.pro_image"
            :author_name="author.f_name + '-' + author.l_name"
          />
        </div>
      </div>
    </section>
  </main>
  <footer>
    <Footer />
  </footer>
</template>

<script>
import BienvenuVue from "../components/Bienvenu.vue";
import CategoriesVue from "../components/Categories.vue";
import stareBook from "../components/starBooks.vue";
import Suggestions from "../components/Suggestions.vue";
import Favoris from "../components/Favoris.vue";
import Auteurs from "../components/box/auteur.vue";
import AppHeader from "../components/Global/Header.vue";
import Footer from "../components/Global/Footer.vue";
import search from "../components/box/bar-search.vue";
// import HScroll from "@koas/v-hscroll";
// import "@samrahnama/triple-state-slider/dist/main.css"
import axios from "axios";

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
    search,
  },
  data() {
    return {
      Books: "",
      Authors: [],
      id_user: localStorage["id_user"],
    };
  },
  mounted() {
    this.AllBooks();
    this.getAuthors();
    // console.log(this.$route.query.test)
    // new Splide( '.splide' ).mount( { AutoScroll } );
  },

  methods: {
    async AllBooks() {
      await axios({
        method: "POST",
        url: "http://attic.local/Book/getAllBooks",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              // console.log(response.data);
              this.Books = response.data;
            }
          }
        })
        .catch((error) => {
          alert(error.status);
        });
    },
    getAuthors() {
      axios({
        method: "POST",
        url: "http://attic.local/Authors/FourAuthors",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              // console.log(response.data);
              this.Authors = response.data;
            }
          }
        })
        .catch((error) => {
          alert(error.status);
        });
    },
  },
};
</script>
<style lang="css">
.snap-y::-webkit-scrollbar {
  width: 5px;
}
</style>
