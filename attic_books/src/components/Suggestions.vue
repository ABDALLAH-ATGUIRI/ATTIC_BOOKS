<template>
  <div class="mx-auto flex justify-around w-2/3 lg:w-4/5 items-center">
    <div
      class="bg-white h-10 w-10 px-6 rounded-full text-4xl flex align-center snap-y justify-center font-bold text-sky-600"
    >
      &LeftArrow;
    </div>
    <div class="w-full">
      <div class="overflow-x-scroll w-auto flex gap-12">
        <div v-for="book in this.Books" :key="book.index">
          <book
            :title="book.titre_book"
            :coverture="book.couverture"
            :category="book.category_book"
            :Id_book="book.Id_book"
            :classification="book.classification"
            
          ></book>
        </div>
      </div>
    </div>

    <div
      class="-leading-8 bg-white px-8 h-10 w-10 rounded-full text-4xl flex align-center justify-center font-bold text-sky-500"
    >
      &RightArrow;
    </div>
  </div>
</template>

<script>
import book from "./box/book.vue";
import axios from "axios";

export default {
  name: "Suggestions",
  components: {
    book,
  },
  data() {
    return {
      Books: "",
    };
  },
  mounted() {
    this.AllBooks();
  },

  methods: {
    AllBooks() {
      axios({
        method: "POST",
        url: "http://attic.local/Book/getAllBooks",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.Books = response.data;
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
<style lang="css" scoped>
.overflow-x-scroll::-webkit-scrollbar {
  display: none;
}
</style>
