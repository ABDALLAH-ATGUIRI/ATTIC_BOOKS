<template>
  <form
    class="md:rounded-lg h-36 w-11/12 mx-auto md:h-auto py-4 grid grid-rows-2 grid-cols-2 gap-4 lg:flex md:flex-row flex-col justify-between align-center"
  >
    <div
      class="relative col-span-2 w-full grid-col-1 flex lg:w-2/5 w-full justify-center md:justify-start text-black"
    >
      <input
        aria-label="search"
        type="search"
        id="search"
        placeholder="Trouvez votre livre"
        class="w-full bg-gray-200 transition border border-transparent focus:outline-none focus:border-sky-500 rounded py-3 px-2 pl-10 appearance-none leading-normal"
        @change="filterBooks()"
        v-model="title"
      />
      <div class="absolute search-icon" style="top: 1rem; left: 0.8rem">
        <svg
          class="fill-current pointer-events-none text-black w-4 h-4"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
        >
          <path
            d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
          ></path>
        </svg>
      </div>
    </div>
    <!-- <div class="flex h-12 lg:w-2/4 gap-6 justify-between"> -->
    <div class="lg:w-3/11">
      <input
        aria-label="search"
        type="search"
        list="cate"
        class="w-full bg-gray-200 transition border border-transparent focus:outline-none focus:border-sky-500 rounded py-3 px-2 pl-10 appearance-none leading-normal"
        placeholder="Catégorie"
        @change="filterBooks()"
        v-model="category"
      />
      <datalist id="cate" class="bg-sky-500">
        <option value="POÉSIE">POÉSIE</option>
        <option value="FICTION HISTORIQUE">FICTION HISTORIQUE</option>
        <option value="CLASSIQUE">CLASSIQUE</option>
        <option value="AMOUR">AMOUR</option>
        <option value="DRAME">DRAME</option>
        <option value="HORREUR">HORREUR</option>
        <option value="ARTS">ARTS</option>
        <option value="LITTÉRATURE D'AFFAIRES">LITTÉRATURE D'AFFAIRES</option>
        <option value="CONTE DE FÉE">CONTE DE FÉE</option>
      </datalist>
    </div>
    <div class="lg:w-3/11">
      <input
        type="search"
        list="brow"
        class="w-full bg-gray-200 transition border border-transparent focus:outline-none focus:border-sky-500 rounded py-3 px-2 pl-10 appearance-none leading-normal"
        placeholder="Auteure"
        @change="filterBooks()"
        v-model="author"
      />
      <datalist id="brow">
        <template v-for="auther in Authors" :key="auther.index">
          <option :value="auther.Id_user">
            {{ auther.f_name }}-{{ auther.l_name }}
          </option>
        </template>
      </datalist>
    </div>
  </form>
</template>

<script>
import axios from "axios";

export default {
  name: "BarSearch",
  data() {
    return {
      Authors: "",
      author: "",
      title: "",
      category: "",
      Books: "",
    };
  },
  mounted() {
    this.getAuthors();
    this.AllBooks();
  },
  methods: {
    getAuthors() {
      axios({
        method: "POST",
        url: "http://attic.local/Authors/allAuthors",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.Authors = response.data;
            }
          }
        })
        .catch((error) => {
          alert(error.status);
        });
    },
    async AllBooks() {
      await axios({
        method: "POST",
        url: "http://attic.local/Book/getAllBooks",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.Books = response.data;
              if (this.$route.query.cate) {
                this.getBookByCate();
              }
            }
          }
        })
        .catch((error) => {
          alert(error.status);
        });
    },
    filterBooks() {
      this.$router.push("/Search");
      let NewBooks = this.Books.filter((book) =>
        this.title != ""
          ? this.title === book.titre_book
          : true && this.category != ""
          ? this.category === book.category_book
          : true && this.author != ""
          ? this.author == book.Id_user
          : true
      );
      this.$store.state.Books = NewBooks;
      // console.log(this.$store.state.Books);
    },
    async getBookByCate() {
      this.category = this.$route.query.cate;
      let NewBooks = this.Books.filter(
        (book) => this.category == book.category_book
      );
      // console.log(this.Books);
      this.$store.state.Books = NewBooks;
    },
  },
  watch: {
    title() {
      this.$store.state.title = this.title;
    },
    category() {
      this.$store.state.category = this.category;
    },
    author() {
      this.$store.state.author = this.author;
    },
  },
};
</script>
