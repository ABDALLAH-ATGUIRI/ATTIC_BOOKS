<!-- This example requires Tailwind CSS v2.0+ -->
<template v-if="compte == true">
  <nav>
    <AppHeader />
  </nav>
  <div class="relative">
    <div class="w-full relative h-72">
      <img
        class="w-full h-full"
        src="../assets/benjamin-voros-phIFdC6lA4E-unsplash.jpg"
        alt=""
      />
      <label for="bg-img" class="absolute w-12 right-0 bottom-0">
        <img src="../assets/icons/add-image.png" alt="" />
      </label>
      <input type="file" name="" id="bg-img" :value="bg_img" hidden />
    </div>
    <div class="h-48 absolute top-12 w-full flex flex-col justify-center">
      <div class="self-center h-full flex flex-col justify-evenly items-center">
        <div class="relative w-28 h-28">
          <img
            class="rounded-full w-full h-full"
            src="../assets/icons/user.png"
            alt="photo profile"
          />
          <label for="profil-img" class="absolute w-7 -right-0 bottom-2">
            <img src="../assets/icons/add-image.png" alt="" />
          </label>
          <input type="file" id="profil-img" :value="pro_img" hidden />
        </div>
        <div class="text-gray-400 font-bold">
          <span>@Abdallah Atguiri</span>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full flex h-36 items-center justify-evenly">
    <div
      class="bg-slate-100 text-black shadow-lg text-center font-bold rounded-sm lg:w-44 py-3 active:bg-sky-600 active:text-white"
    >
      Mes lectures
    </div>
    <div
      class="bg-slate-100 text-black shadow-lg text-center font-bold rounded-sm lg:w-44 py-3 active:bg-sky-600 active:text-white"
    >
      Mes livres
    </div>
    <div
      class="bg-slate-100 text-black shadow-lg text-center font-bold rounded-sm lg:w-44 py-3 active:bg-sky-600 active:text-white"
    >
      Liste de souhaits
    </div>
    <div
      class="bg-slate-100 text-black shadow-lg text-center font-bold rounded-sm lg:w-44 py-3 active:bg-sky-600 active:text-white"
    >
      Mon classement
    </div>
  </div>
  <!-- <footer>
    <Footer />
  </footer> -->
</template>

<script>
import BienvenuVue from "../components/Bienvenu.vue";
import CategoriesVue from "../components/Categories.vue";
import stareBook from "../components/starBooks.vue";
import Suggestions from "../components/Suggestions.vue";
import Favoris from "../components/Favoris.vue";
import Auteurs from "../components/Auteurs.vue";
import AppHeader from "../components/Global/Header.vue";
import Footer from "../components/Global/Footer.vue";
import router from "../router";

export default {
  name: "home",
  data() {
    return {
      pro_img: "",
      bg_img: "",
      compte: "",
    };
  },
  components: {
    BienvenuVue,
    CategoriesVue,
    stareBook,
    Suggestions,
    Favoris,
    Auteurs,
    AppHeader,
    Footer,
  },
  mounted() {
    this.com();
  },
  methods: {
    com() {
      this.compte = this.$store.getters.popupShow;
      if (this.compte === false) {
        router.push({ path: "/" });
      }
    },
    uploadImage(ele) {
      formData = new FormData();
      imgFile = ele.files[0];
      if (imgFile === undefined) return null;

      ext = imgFile.name.split(".").pop();
      uniqName =
        Math.floor(Math.random() * Math.pow(10, 10)).toString() + "." + ext;
      formData.append("uniqName", uniqName);
      formData.append("avatar", imgFile);

      fetch("attic.local/Includes/upload.php", {
        method: "post",
        body: formData,
      }).catch(console.error);

      return uniqName;
    },
    changeImage() {
      let postImage = uploadImage();

      let myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");

      let raw = JSON.stringify({
        doctor_id: sessionStorage.getItem("doctorIndex"),
        category_id: document.getElementById("categories").value,
        title: document.getElementById("title").value,
        body: CKEDITOR.instances.content.getData(),
        image: postImage,
        resources: document.getElementById("source").value,
        dislikeControle: document.getElementById("likeControle").value,
        commentControle: document.getElementById("comControle").value,
      });

      let requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
      };

      fetch("http://localhost/fileRouge/post/insertPost", requestOptions)
        .then((response) => response.text())
        .then((result) => console.log(result))
        .catch((error) => console.log("error", error));
    },
  },
};
</script>
