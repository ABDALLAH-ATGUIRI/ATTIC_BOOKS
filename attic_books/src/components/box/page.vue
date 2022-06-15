<template>
  <div class="relative w-3/4 h-screen ml-auto overflow-y-scroll">
    <div
      class="w-2/3 font-medium shadow-2xl border-black mx-auto mt-32 divide-x-16"
    >
      <div class="w-5/6 py-10 mx-auto text-base">
        <div>
          <div class="flex flex-col">
            <label for="titre" class="pb-5"
              >Titre du chapitre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              >
            </label>
            <input
              type="text"
              id="titre"
              class="border-2 p-2 text-sm font-medium"
              maxlength="50"
              v-model="this.$store.state.slide.title"
              @change="addToCart()"
            />
          </div>
          <div class="flex flex-col pt-6">
            <label for="Description " class="pb-5"
              >Chapitre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <textarea
              class="border-2 h-screen p-3 overflow-hidden text-sm"
              id="Description "
              v-model="this.$store.state.slide.body"
              @change="addToCart()"
            ></textarea>
          </div>
          <input type="hidden" v-model="this.$store.state.slide.index" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  // props: ["title", "body", "index"],
  data() {
    return {
      title: "",
      body: "",
      index: "",
      id_book: this.$route.query.book,
      id_user: localStorage["id_user"],
    };
  },
mounted()
{
this.getBook();
},
  methods: {
    show() {
      this.title = this.$store.state.slide.title;
      this.body = this.$store.state.slide.body;
      this.index = this.$store.state.slide.index;
      this.id_book = this.$route.query.book

      // console.log(this.title, this.body, this.index);
    },
    addToCart() {
      this.show();
      let item = {
        title: this.title,
        body: this.body,
        index: this.index,
        id_book : this.id_book
      };
      this.$store.commit("slides", item);

      this.$store.commit("addCart", item);
    },
    getBook() {
      let formData = new FormData();
      formData.append("id_user", this.id_user);
      formData.append("id_book", this.id_book);

      axios({
        method: "POST",
        url: "http://attic.local/Book/GetAllChapiters",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data != '') {
              let item = [];
              response.data.map(function (value, key) {
                item.push({
                  title: value.titre_paragraphe,
                  body: value.paragraphe,
                  index: key,
                  id_book: value.id_book,
                });
                
              });              
              this.$store.state.carts = item ;
            }
          }
        })
        .catch((error) => {
        });
    },
    addItel(item) {},
  },
  watch: {
    title() {
      this.addToCart();
    },
    body() {
      this.addToCart();
    },
  },
};
</script>
