<template>
  <div class="fixed w-full tsrons flex justify-center h-[90vh] absolute z-40">
    <div
      class="bg-amber-50 p-10 h-4/6 max-w-96 lg:w-1/2 rounded-lg flex justify-center top-16 relative"
    >
      <div class="w-48 h-48 absolute top-16">
        <img
          class="w-48 h-48 rounded-full absolute"
          :src="'/src/assets/uploads/' + image"
          alt=""
        />
        <div>
          <label for="profil-img" class="absolute w-12 right-0 bottom-2">
            <img src="../../assets/uploads/add-image.png" alt="" />
          </label>
          <input
            hidden
            type="file"
            id="profil-img"
            multiple
            @change="uploadImg($event, index)"
          />
        </div>
      </div>
      <div class="w-full flex items-end text-white justify-around">
        <button
          class="font-semibold p-2 min-w-1/3 font-medium px-6 rounded-md bg-red-600"
          @click="$store.commit('toggle')"
        >
          Annuler
        </button>
        <button
          class="font-semibold p-2 min-w-1/3 font-medium px-6 rounded-md bg-sky-600"
          @click="changeImage"
        >
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Annuler from "./botton_annuler.vue";
import axios from "axios";

export default {
  name: "Suggestions",
  components: {
    Annuler,
  },
  data() {
    return {
      image: localStorage["pro_image"],
    };
  },
  methods: {
    uploadImg(evt, index) {
      let formData = new FormData();
      let imgFile = evt.target.files[0];

      if (imgFile === undefined) return null;

      let ext = imgFile.name.split(".").pop();
      if (ext == 'jpg' || ext =="png" || ext =='jpeg') {
        let uniqName =
          Math.floor(Math.random() * Math.pow(10, 10)).toString() + "." + ext;

        formData.append("uniqName", uniqName);
        formData.append("avatar", imgFile);

        axios({
          method: "POST",
          url: "http://attic.local/Includes/uploads",
          data: formData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status === 200) {
              this.image = uniqName;
            }
          })
          .catch(console.error);
      }else{
        alert('Vous ne pouvez pas télécharger ce fichier')
      }
    },
    changeImage() {
      let bodyFormData = new FormData();
      bodyFormData.append("profile", this.image);
      bodyFormData.append("id_user", localStorage["id_user"]);

      axios({
        method: "post",
        url: "http://attic.local/user/ImgProfile",
        data: bodyFormData,
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            console.log(response.data);
            if (response.data == true) {
              localStorage.setItem("pro_image", this.image);
              this.$store.commit("toggle");
              this.$store.state.user_img = this.image;
              //  this.$router.push("/Profile");
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
