<template>
  <div class="px-auto w-5/6 mx-auto">
    <div class="flex w-full mb-14  flex-col md:flex-row gap-10">
      <div
        class="relative ml-2 col-span-2 w-full grid-col-1 flex md:w-1/3 w-full justify-center md:justify-start text-white"
      >
        <input
          aria-label="search"
          type="search"
          id="search"
          placeholder=" Trouvez votre livre "
          class="w-full text-black bg-gray-200 transition border border-transparent focus:outline-none focus:border-sky-500 rounded py-3 px-2 pl-10 appearance-none leading-normal"
          @change="search"
          v-model="Title"
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
      <div  v-if="who" class="flex justify-between h-auto md:w-2/3">
        <div
          class="flex items-center cursor-pointer  bg-slate-100 text-black text-xs lg:text-sm shadow-lg text-center font-bold rounded-sm p-4"
          @click="search"
        >
          <span  >toute</span>
        </div>
        <div
          class="flex items-center cursor-pointer gap-5 justify-center bg-slate-100 text-xs text-black lg:text-sm shadow-lg text-center font-bold rounded-sm p-4 "
          @click="privateBook(0)"
        >
          <span class="sm:flex hidden">livres privés</span>
          <img class="w-5 h-5" src="../assets/icons/private.png" alt="" />
        </div>
        <div
          class="flex items-center cursor-pointer  gap-5 justify-center bg-slate-100 text-xs text-black lg:text-sm shadow-lg text-center font-bold rounded-sm p-4 "
          @click="privateBook(1)"
        >
          <span class="sm:flex hidden">livres publics</span>
          <img class="w-5 h-5" src="../assets/icons/team.png" alt="" />
        </div>
        <div
          class="flex items-center cursor-pointer gap-5 justify-center bg-slate-100 text-black text-xs lg:text-sm shadow-lg text-center font-bold rounded-sm p-4 "
          @click="annuler"
        >
          <span class="sm:flex hidden h-auto"> livres annulés </span>
          <img class="w-5 h-5" src="../assets/icons/trash.png" alt="" />
        </div>
      </div>
    </div>

    <div class="mt-8 grid gap-16 md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-2">
      <div v-for="book in myBooks" :key="book.index">
        <books
          :title="book.titre_book"
          :coverture="book.couverture"
          :category="book.category_book"
          :Id_book="book.Id_book"
          :classification="book.classification"
          :description="book.Description"
          :profile="book.pro_image"
          :Author="book.f_name + '&nbsp;-&nbsp;' + book.l_name"
          :id_author="book.Id_user"
          :publish="book.publisher"
          :annuler="book.Annuler"
          class="h-full self-center"
        ></books>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Books from "./box/book.vue";
export default {
  name: "myBooks",
  props: ["Author","who"],
  components: {
    Books,
  },
  data() {
    return {
      Books: "",
      myBooks: "",
      id_user: this.Author,
      Title: "",
    };
  },
  mounted() {
    if (this.$route.query.Author) {
      this.id_user = this.$route.query.Author;
    }
    this.MyBooks();
  },
  methods: {
    MyBooks() {
      let formData = new FormData();
      formData.append("id_user", this.id_user);
      axios({
        method: "POST",
        url: "http://attic.local/Book/getMyBooks",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.Books = response.data;
              this.myBooks = this.Books;
              this.privateBook(1)
            }
          }
        })

        .catch((error) => {
          alert(error.status);
        });
    },
    async search() {
      let NewBooks = this.myBooks.filter((book) =>
        this.Title ? this.Title === book.titre_book : true && book.Annuler === 0
      );
      this.myBooks = NewBooks;
    },
    privateBook(x) {
      let NewBooks = this.Books.filter(
        (book) => book.publisher === x && book.Annuler === 0
      );
      this.myBooks = NewBooks;
    },
    annuler() {
      let NewBooks = this.Books.filter(
        (book) => book.Annuler === 1
      );
      this.myBooks = NewBooks;
    },
  },
};
</script>
