<template>
  <div
    class="mx-auto p-10 bg-orange-50 shadow-2xl min-h-screen border-black md:mt-20 divide-x-16 ml-auto"
  >
    <div>
      <h1 class="text-center font-bold text-2xl py-10">
        {{ title }}
      </h1>
    </div>
    <div class="leading-8 pb-5 md:px-8 text-sm font-medium">
      {{ body }}
    </div>
  </div>
  <div class="w-full flex py-10 px-24 justify-between">
    <span @click="Retour">← Retour</span>
    <span @click="Continuer">Continuer →</span>
  </div>
  <div></div>
</template>

<script>
import axios from "axios";
export default {
  name: "chapiter",
  data() {
    return {
      index_chapiter: 0,
      id_book: this.$route.query.book,
      title: "",
      body: "",
    };
  },
  mounted() {
    this.getBook();
  },
  methods: {
    getBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", this.id_book);
      bodyFormData.append("chapiter", this.index_chapiter);
      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/readBook",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                this.title = response.data.titre_paragraphe;
                this.body = response.data.paragraphe;
              } else {
                alert("s'il vous plaît requis les entrées");
              }
            }
          })
          .catch((error) => {});
      }
    },
    Continuer() {
      this.index_chapiter += 1;
      this.getBook();
    },
    Retour() {
      if (this.index_chapiter > 0) {
        this.index_chapiter -= 1;
        this.getBook();
      }
    },
  },
};
</script>
