<template>
  <div
    class="w-full z-40 absolute bg-sky-600 h-20 top-0 md:pr-10 flex items-center justify-between"
  >
    <div
      class="pl-2 text-xs text-white flex items-center justify-evenly lg:w-1/4 md:w-1/3 sm:w-1/2"
    >
      <span
        class="font-bold text-4xl cover cursor-pointer"
        @click="$router.push('/Details?book=' + id_book)"
      >
        &lang;
      </span>
      <div class="flex flex-col text-center">
        <span class="text-xs text-gray-300"
          >Ajouter une description sur le livre
        </span>
        <span class="md:text-lg md:text-md font-bold tracking-widest"
          >Livre sans titre</span
        >
      </div>
    </div>
    <div class="flex justify-end w-full pb-2">
      <button
        @click="addBook"
        class="font-semibold hidden md:block p-3 text-black text-sm font-medium px-10 rounded-md bg-white"
      >
        Enregistré
      </button>
      <div class="md:hidden justify-evenly flex items-center">
        <button
          class="md:w-full w-12 h-10 md:flex self-start items-center justify-center"
          @click="$store.commit('incrementCount')"
        >
          <img
            src="../assets/icons/plus.png"
            class="w-8 hover:w-10 duration-300 ease-in-out"
            alt="Add page"
          /></button
        ><button
          class="md:w-full w-12 h-10 md:flex self-start items-center justify-center"
          @click="addBook"
        >
          <img
            class="w-8 hover:w-10 duration-300 ease-in-out"
            src="../assets/icons/diskette (1).png"
            alt="Enregistré"
          />
        </button>
      </div>
    </div>
  </div>
  <div
    class="md:w-1/4 w-full h-[160px] md:h-screen top-0 mt-20 z-4 md:fixed bg-slate-100 border-1 font-medium border-black flex md:flex-col divide-x-16"
  >
    <div
      class="px-4 md:pb-24 flex gap-8 md:block items-center md:mt-12 w-full md:h-screen overflow-x-scroll md:overflow-y-scroll scrollbar-thin scrollbar-w-2 scrollbar-track-blue-300 scroll-smooth scrollbar-track-rounded-full shadow-xl"
    >
      <div v-for="number in $store.state.carts" :key="number.index">
        <WritingPageVue
          v-bind:title="number.title"
          v-bind:body="number.body"
          v-bind:number="number.index + 1"
          v-bind:id_book="this.$route.query.book"
          v-bind:index="number.index"
          @click="
            chapiter(number.index, number.title, number.body, number.id_book)
          "
        ></WritingPageVue>
      </div>
      <div
        class="md:w-full hidden w-12 h-10 md:mb-20 md:flex self-start mt-10 items-center justify-center"
      >
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
  },
  mounted() {},
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
    addBook() {
      this.$store.commit("incrementCount");
      this.$router.push("/Profile");
    },
  },
};
</script>

<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
