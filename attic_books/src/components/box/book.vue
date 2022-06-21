<template>
  <div class="flex justify-center w-full flex-nowrap drop-shadow-2xl">
    <div class="relative group w-[200px] h-72 overflow-hidden bg-black m-auto">
      <img
        class="object-cover w-full h-full transform duration-700 backdrop-opacity-100"
        :src="`/src/assets/uploads/` + coverture"
      />
      <div
        class="absolute w-full h-full shadow-2xl opacity-20 transform duration-500 inset-y-full group-hover:-inset-y-0 group-focus:-inset-y-0"
      ></div>
      <div
        class="absolute bg-gradient-to-b from-sky-900 w-full h-full transform duration-500 inset-y-3/4 group-hover:-inset-y-0 group-focus:-inset-y-0"
      >
        <div class="absolute w-full flex place-content-center">
          <h2
            class="capitalize font-serif font-bold text-xl text-center shadow-2xl text-white mt-3"
          >
            {{ title }}
          </h2>
        </div>
        <div class="absolute w-full flex place-content-center mt-20">
          <p class="font-sans text-sm w-4/5 text-white mt-5">
            Ce livre est classé sous {{ category }} , s'adresse aux
            {{ classification }}
          </p>
        </div>
        <router-link :to="'/Read/?book=' + Id_book + '#above'">
          <button
            class="absolute bottom-4 bg-white text-black font-bold rounded-sm h-10 w-full"
          >
            Lisez
          </button>
        </router-link>
      </div>
    </div>
    <template v-if="id_author == id_user && annuler == 0">
      <div class="flex flex-col justify-around h-2/3">
        <div
          v-if="pub == 0"
          class="w-8 h-8 hover:w-9 hover:h-9 duration-150 ease-in-out ease-in-in"
          @click="publisher"
        >
          <img src="../../assets/icons/private.png" alt="public" />
        </div>
        <div
          v-if="pub == 1"
          class="w-7 h-7 hover:w-8 hover:h-8 duration-150 ease-in-out ease-in-in"
        >
          <img
            src="../../assets/icons/team.png"
            @click="publisher"
            alt="public"
          />
        </div>
        <routerLink
          class="w-7 h-7 hover:w-8 hover:h-8 duration-150 ease-in-out"
          :to="'/Details?book=' + Id_book"
        >
          <img
            src="../../assets/icons/edit (1).png"
            @click="editBook"
            alt="edit"
          />
        </routerLink>

        <div
          class="w-7 h-7 hover:w-8 hover:h-8 duration-150 ease-in-out"
          @click="deleteBook"
        >
          <img src="../../assets/icons/trash.png" alt="delete" />
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "book",
  props: [
    "title",
    "coverture",
    "category",
    "Id_book",
    "classification",
    "id_author",
    "publish",
    "annuler",
  ],
  data() {
    return {
      id_user: localStorage["id_user"],
      pub: "",
    };
  },
  mounted() {
    this.pub = this.publish;
  },
  methods: {
    deleteBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", this.Id_book);

      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/DelBook",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                if (response.data == true) location.reload();
              } else {
                alert("");
              }
            }
          })
          .catch((error) => {});
      }
    },
    publisher() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", this.Id_book);

      bodyFormData.append("publish", this.pub);

      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/PublishBook",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data === true) {
                this.pub = !this.pub;
              } else {
                alert(response.data);
              }
            }
          })
          .catch((error) => {});
      }
    },
  },
  watch: {
    publish() {
      this.pub = this.publish;
    },
  },
  setup() {},
};
</script>
