<template>
  <HeaderBooK></HeaderBooK>
  <div
    class="w-1/4 top-0 z-4 fixed bg-slate-100 border-1 font-medium border-black flex flex-col divide-x-16"
  >
    <div class="flex h-36 w-full">
      <div class="flex justify-around items-center w-full self-end pb-2">
        <Annuler></Annuler>
        <button
          class="font-semibold border-2 bg-blue-600 active:bg-blue-800 rounded-sm text-white p-2 text-medium font-bold px-8 rounded-md"
          @click="addBook"
        >
          Enregistré
        </button>
      </div>
    </div>
    <div
      class="px-4 pb-24 w-full h-screen overflow-y-scroll scrollbar-thin scrollbar-w-2 scrollbar-track-blue-300 scroll-smooth scrollbar-track-rounded-full shadow-xl"
    >
      <template v-for="number in $store.state.count" :key="number">
        <WritingPageVue
          v-bind:title="$store.state.carts[number - 1].title"
          v-bind:body="$store.state.carts[number - 1].body"
          v-bind:number="number"
          @click="
            chapiter(
              number - 1,
              $store.state.carts[number - 1].title,
              $store.state.carts[number - 1].body
            )
          "
        ></WritingPageVue>
      </template>
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
export default {
  name: "WritingPage",
  data() {
    return {
      title: "",
      body: "",
      index: "",
      data: "",
    };
  },
  created() {
    // console.log(this.$store.state.carts[this.$store.state.count])
  },
  methods: {
    chapiter(index, title, body) {
      const item = {
        title: title,
        body: body,
        index: index,
      };
      this.$store.commit("slides", item);
    },
    addBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", localStorage["Id_book"]);
      bodyFormData.append("chapiters", JSON.stringify(this.$store.state.carts));
      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/chapters",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                this.$router.push("/Profile");
              } else {
                alert("s'il vous plaît requis les entrées");
              }
            }
          })
          .catch((error) => {});
      }
    },
  },
  components: {
    WritingPageVue,
    Page,
    HeaderBooK,
    Annuler,
  },
};
</script>

<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
