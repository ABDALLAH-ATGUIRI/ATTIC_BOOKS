<template>
  <AppHeader></AppHeader>

  <div class="flex lg:flex-row flex-col mx-auto w-11/12 justify-evenly">
    <div class="md:w-5/6 mx-auto">
      <Auteur
        :author_id="author"
        :author_pro="author_pro"
        :author_name="author_name"
      ></Auteur>
      <div id="above" class="w-full mt-10 mx-auto">
        <div
          class="w-full mx-auto px-10 bg-orange-50 shadow-2xl min-h-[1000px] border-black md:mt-20 divide-x-16 ml-auto"
        >
          <div class="py-10">
            <h1 class="text-center font-bold text-lg md:text-2xl py-5">
              {{ title }}
            </h1>
            <div
              class="flex lg:w-1/3 w-full mx-auto justify-around items-center justify-center"
            >
              <div class="flex font-bold text-xs gap-2 items-center">
                <img class="w-7 h-7" src="../assets/icons/view.png" alt="" />
                <span>50</span>
              </div>
              <div class="flex font-bold text-xs gap-2 items-center">
                <img
                  class="w-6 h-6 hover:w-7 hover:h-7"
                  src="../assets/icons/like.png"
                  alt=""
                />
                <span>50</span>
              </div>
              <div
                @click="CommanterPoup"
                class="flex cursor-pointer font-bold text-xs gap-2 items-center"
              >
                <img
                  class="w-6 h-6 hover:w-7 hover:h-7"
                  src="../assets/icons/bubble-chat.png"
                  alt=""
                />
                <span>{{ contComm }}</span>
              </div>
            </div>
          </div>

          <div class="leading-8 pb-5 md:px-8 text-sm font-medium">
            {{ body }}
          </div>
        </div>
        <div class="relative pb-16">
          <div
            class="w-11/12 absolute flex py-10 mx-auto items-center justify-between"
          >
            <a
              href="#above"
              v-if="index_chapiter > 1"
              class="px-3 py-2 text-3xl md:text-5xl text-sky-600 cursor-pointer"
              @click="Continuer(index_chapiter - 1)"
              >←</a
            >
            <div
              class="px-6 flex gap-14 overflow-x-scroll snap-y snap-mandatory items-center justify-between"
            >
              <a
                href="#above"
                v-for="index in indexes"
                :key="index"
                class="cursor-pointer transform transition ease-in-out duration-800"
                :class="
                  index === this.index_chapiter
                    ? 'text-sky-700 text-4xl snap-center snap-always'
                    : ''
                "
                @click="Continuer(index)"
                >{{ index }}</a
              >
            </div>
            <a
              href="#above"
              v-if="index_chapiter < indexes"
              class="px-3 py-2 text-3xl md:text-5xl text-sky-600 cursor-pointer"
              @click="Continuer(index_chapiter + 1)"
              >→</a
            >
          </div>
        </div>
      </div>
    </div>
    <template v-if="popupcom">
      <div
        class="w-screen h-full top-20 z-0 right-0 fixed bg-gradient-to-r from-blue-200"
        @click="popupcom = !popupcom"
      ></div>
      <Commanter :chapiter="id_chapiter" :reader="reader"></Commanter>
    </template>
  </div>

  <Footer></Footer>
</template>

<script>
import Auteur from "../components/box/auteur.vue";
import AppHeader from "../components/Global/Header.vue";
import Commanter from "../components/box/commanter.vue";
import Footer from "../components/Global/Footer.vue";
import axios from "axios";
export default {
  name: "Read",
  data() {
    return {
      index_chapiter: 1,
      id_book: this.$route.query.book,
      reader: localStorage["id_user"],
      id_chapiter: "",
      title: "",
      body: "",
      indexes: "",
      author: "",
      author_name: "",
      author_pro: "",
      popupcom: false,
      contComm: "",
    };
  },
  components: {
    AppHeader,
    Footer,
    Commanter,
    Auteur,
  },
  mounted() {
    this.getBook();
    this.countChapiter();
  },

  methods: {
    CommanterPoup() {
      if (localStorage["id_user"]) {
        this.popupcom = !this.popupcom;
      } else {
        this.$store.state.popupConn = !this.$store.state.popupConn;
      }
    },
    countChapiter() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", this.id_book);
      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/countChapiters",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                this.indexes = parseInt(response.data);
              }
            }
          })
          .catch((error) => {});
      }
    },
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
                this.author = response.data.Id_user;
                this.id_chapiter = response.data.Id_paragraphe;
                this.count(this.id_chapiter);
                this.Author();
              } else {
                this.$router.go(-1);
              }
            }
          })
          .catch((error) => {});
      }
    },
    Author() {
      let formdata = new FormData();
      formdata.append("id_user", this.author);
      axios({
        method: "post",
        url: "http://attic.local/Authors/Author",
        data: formdata,
        headers: { "Content-Type": "multipart/FormData" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.author_pro = response.data.pro_image;
              this.author_name =
                response.data.f_name + "-" + response.data.l_name;
            }
          }
        })
        .catch((error) => {
          window.history.back();
        });
    },
    count(id) {
      let bodyFormData = new FormData();
      bodyFormData.append("Id_chapiter", id);
      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Post/count",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                this.contComm = response.data[0];
              } else {
                alert("s'il vous plaît requis les entrées");
              }
            }
          })
          .catch((error) => {});
      }
    },
    Continuer(ind) {
      if (ind) {
        this.index_chapiter = ind;
      }

      this.getBook();
    },
  },
};
</script>
