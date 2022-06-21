<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <nav>
    <AppHeader />
  </nav>

  <ProfileImage v-if="$store.state.showImgPopup"></ProfileImage>
  <BackgroundImage v-if="$store.state.showImgPopupbg"></BackgroundImage>
  <div class="flex">
    <div class="w-full bg-gray-200 h-64">
      <img
        class="w-full h-full"
        :src="'/src/assets/uploads/' + bg_img"
        alt=""
      />
      <button
        v-if="who"
        @click="$store.commit('bgPopup')"
        class="absolute z-30 w-10 right-0 top-72"
      >
        <img src="../assets/uploads/add-image.png" alt="" />
      </button>
    </div>
    <div
      class="h-48 absolute left-[40vw] right-[40vw] top-64 mx-auto flex flex-col justify-center"
    >
      <div class="h-full flex flex-col justify-evenly items-center">
        <div class="relative w-28 h-28">
          <img
            class="rounded-full bg-gray-500 w-full h-full"
            :src="'/src/assets/uploads/' + pro_img"
            alt="photo profile"
          />
          <button
            v-if="who"
            @click="$store.commit('toggle')"
            class="absolute w-6 -right-0 bottom-2"
          >
            <img src="../assets/uploads/add-image.png" alt="" />
          </button>
        </div>
        <div class="text-gray-800 text-xl font-extrabold">
          <span>@{{ f_name }}&nbsp;-&nbsp;{{ l_name }}</span>
        </div>
      </div>
    </div>
  </div>
  <div
    class="w-full mt-32 lg:text-[16px] flex h-36 text-xs items-center justify-evenly"
  >
    <div
      class="flex items-align cursor-pointer gap-5 justify-center bg-slate-100 text-black text-md shadow-lg text-center font-bold rounded-sm p-4"
      @click="con = 'Lecture'"
      :class="{ 'bg-sky-600 text-white': con == 'Lecture' }"
    >
      <span>Liste de Lecture</span>

      <img class="w-5 h-5" src="../assets/icons/open-book.png" alt="" />
    </div>
    <div
      class="flex items-align cursor-pointer gap-5 justify-center bg-slate-100 text-black text-md shadow-lg text-center font-bold rounded-sm p-4"
      @click="con = 'Souhaits'"
      :class="{ 'bg-sky-600 text-white': con == 'Souhaits' }"
    >
      <span>Liste de souhaits</span>
      <img src="../assets/icons/love.png" class="w-6 h-5" alt="" />
    </div>
    <div
      class="flex items-align cursor-pointer gap-5 justify-center bg-slate-100 text-black text-md shadow-lg text-center font-bold rounded-sm p-4"
      @click="con = 'Ecriture'"
      :class="{ 'bg-sky-600 text-white': con == 'Ecriture' }"
    >
      <span>Liste d'écriture</span>
      <img class="w-5 h-5" src="../assets/icons/quill-pen.png" alt="" />
    </div>
  </div>
  <div class="mt-10" v-if="con == 'Ecriture'">
    <myBooks :Author="id_user" :who="who"></myBooks>
  </div>
</template>

<script>
import AppHeader from "../components/Global/Header.vue";
import BackgroundImage from "../components/box/background_img.vue";
import ProfileImage from "../components/box/user_img.vue";
import axios from "axios";
import MyBooks from "../components/MyBooks.vue";
import router from "../router";

export default {
  name: "home",
  data() {
    return {
      pro_img: this.$store.state.user_img,
      bg_img: this.$store.state.bg_img,
      f_name: "",
      l_name: "",
      id_user: localStorage["id_user"],
      who: true,
      showImgPopup: 0,
      showImgPopupbg: 0,
      con: "Ecriture",
      profile : this.$route.query.Author,
    };
  },
  components: {
    AppHeader,
    BackgroundImage,
    ProfileImage,
    MyBooks,
  },
  mounted() {
    this.com();
    this.whoI();
  },
  computed: {
    showImgPopup() {
      return this.$store.state.showImgPopup;
    },
    showImgPopupbg() {
      return this.$store.state.showImgPopupbg;
    },
  },
  methods: {
    userInfo() {
      this.f_name = localStorage["f_name"];
      this.l_name = localStorage["l_name"];
    },
    Author() {
      let formdata = new FormData();
      formdata.append("id_user", this.id_user);
      axios({
        method: "post",
        url: "http://attic.local/Authors/Author",
        data: formdata,
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.pro_img = response.data["pro_image"];
              this.bg_img = response.data["bg_image"];
              this.f_name = response.data["f_name"];
              this.l_name = response.data["l_name"];
            } else {
              router.push({ path: "/" });
            }
          }
        })
        .catch((error) => {
          window.history.back();
        });
    },
    com() {
      this.who = this.$store.getters.popupShow;
      if (this.who != true) {
        router.push({ path: "/" });
      }
    },
    whoI() {
      if (this.profile) {
        this.id_user = this.profile;
        this.who = false;
        this.Author();
      } else {
        this.userInfo();
      }
    },
  },
};
</script>
<style lang="css">
*::-webkit-scrollbar {
  width: 5px;
}
</style>
