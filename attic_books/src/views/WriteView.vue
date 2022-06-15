<template>
  <HeaderBooK></HeaderBooK>
  <div
    class="w-1/4 top-0 z-4 fixed bg-slate-100 border-1 font-medium border-black flex flex-col divide-x-16"
  >
    <div class="flex h-36 w-full">
      <div class="flex justify-around items-center w-full self-end pb-2">
        <Annuler></Annuler>

        <template v-if="this.id_book">
          <button
            @click="EditBook"
            class="font-semibold text-white p-2 font-medium px-6 rounded-md bg-sky-600"
          >
            Enregistré
          </button>
        </template>
        <template v-else>
          <button
            @click="addBook"
            class="font-semibold p-2 text-white font-medium px-6 rounded-md bg-sky-600"
          >
            Enregistré
          </button>
        </template>
      </div>
    </div>
    <div
      class="px-4 pb-24 w-full h-screen overflow-y-scroll scrollbar-thin scrollbar-w-2 scrollbar-track-blue-300 scroll-smooth scrollbar-track-rounded-full shadow-xl"
    >
      <div v-for="number in $store.state.carts" :key="number.index">
        <WritingPageVue
          v-bind:title="number.title"
          v-bind:body="number.body"
          v-bind:number="number.index+1"
          v-bind:id_book="this.$route.query.book"
          v-bind:index="number.index"
          @click="
            chapiter(
              number.index,
              number.title,
              number.body,
              number.id_book
            )
          "
        ></WritingPageVue>
      </div>
      <div class="w-full h-12 mb-20 flex items-center justify-center">
        <img
          src="../assets/icons/plus.png"
          class="w-10 hover:w-12 duration-300 ease-in-out"
          alt="Add page"
          @click="$store.commit('incrementCount')"
        />
      </div>
    </div>
  </div>

  <Page></Page>
</template>
<script>
import WritingPageVue from "../components/Global/WritingPage.vue";
import Page from "../components/box/page.vue";
import HeaderBooK from "../components/Global/HeaderBook.vue";
import Annuler from "../components/box/botton_annuler.vue";
import axios from "axios";
// import { forEach } from "cypress/types/lodash";
export default {
  name: "WritingPage",
  data() {
    return {
      title: "",
      body: "",
      index: "",
      data: "",
      id_book: this.$route.query.book,
      id_user: localStorage["id_user"],
    };
  },
  components: {
    WritingPageVue,
    Page,
    HeaderBooK,
    Annuler,
  },
  mounted() {
  },
  methods: {
    chapiter(index, title, body, id_book) {
      const item = {
        title: title,
        body: body,
        index: index,
        id_book: id_book,
      };

      this.$store.commit("slides", item);
    },

    EditBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", this.id_book);
      bodyFormData.append("id_user", this.id_user);
      bodyFormData.append("chapiters", JSON.stringify(this.$store.state.carts));
      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/EditChapiters",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                console.log(response.data);
                // this.$router.push("/Profile");
              } else {
                alert("");
              }
            }
          })
          .catch((error) => {});
      }
    },
  },
};
</script>

<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
