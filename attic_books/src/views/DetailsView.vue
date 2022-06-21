<template>
    <div
    class="w-full fixed z-40 absolute bg-sky-600 h-20 top-0 pr-10 flex items-center justify-between"
  >
    <div class="pl-2 text-white flex items-center justify-evenly md:w-1/4">
      <span
        class="font-bold text-4xl cover cursor-pointer"
        @click="$router.push('/')"
      >
        &lang;
      </span>
      <div class="flex flex-col text-center">
        <span class="text-xs text-gray-300"
          >Ajouter une description sur le livre
        </span>
        <span class="md:text-2xl font-bold tracking-widest"
          >Livre sans titre</span
        >
      </div>
    </div>
  </div>
  <div class="md:w-11/12 mx-auto">
    <div
      class="w-full text-xl font-medium shadow-2xl border-black mt-32 divide-x-16 ml-auto"
    >
      <div class="py-6 pl-16 font-bold">
        <span
          class="w-full text-center tracking-widest mx-auto divide-x hover-underline-animation"
          >Détails de l'histoire</span
        >
      </div>
      <hr class="w-[320px] bg-sky-500 h-2 rounded-r-xl" />
      <hr />
      <div class="md:flex h-full">
        <div class="w-1/5 min-w-[250px] mt-24 mx-auto">
          <label
            for="image"
            class="bg-gray-300 relative h-[400px] hover-shadow-lg rounded-md flex items-center justify-around"
          >
            <img
              class="h-full rounded-md w-full"
              :src="'/src/assets/uploads/' + couverture"
              alt=""
            />
            <div class="absolute flex z-40 flex-col items-center">
              <img src="../assets/uploads/add-image.png" class="w-14" alt="" />
              <span class="text-xs">Ajouter une couverture</span>
            </div>
          </label>

          <input
            type="file"
            hidden
            id="image"
            multiple
            @change="uploadImage($event, index)"
            required
          />
        </div>
        <div
          class="md:w-3/5 w-11/12 h-full mx-auto pt-20 h-screen flex flex-col justify-around"
        >
          <div class="md:flex justify-between w-full">
            <div class="flex flex-col md:w-1/2 md-mr-5">
              <label for="Catégorie " class="pb-5 f"
                >Catégorie
                <span
                  class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                  >!</span
                ></label
              >
              <select
                name=""
                id="Catégorie"
                class="border-2 p-2 text-sm font-medium"
                v-model="Category"
                required
              >
                <option value="">Catégorie</option>
                <option value="POÉSIE">POÉSIE</option>
                <option value="FICTION HISTORIQUE">FICTION HISTORIQUE</option>
                <option value="CLASSIQUE">CLASSIQUE</option>
                <option value="AMOUR">AMOUR</option>
                <option value="DRAME">DRAME</option>
                <option value="HORREUR">HORREUR</option>
                <option value="ARTS">ARTS</option>
                <option value="LITTÉRATURE D'AFFAIRES">
                  LITTÉRATURE D'AFFAIRES
                </option>
                <option value="CONTE DE FÉE">CONTE DE FÉE</option>
              </select>
            </div>
            <div class="flex flex-col md:w-1/2 md:ml-5">
              <label for="Langue" class="pb-5"
                >Langue
                <span
                  class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                  >!</span
                ></label
              >
              <select
                name=""
                id="Langue"
                class="border-2 p-2 text-sm font-medium"
                v-model="Language"
                required
              >
                <option value="POÉSIE">POÉSIE</option>
                <option value="FICTION HISTORIQUE">FICTION HISTORIQUE</option>
                <option value="CLASSIQUE">CLASSIQUE</option>
                <option value="AMOUR">AMOUR</option>
                <option value="DRAME">DRAME</option>
                <option value="HORREUR">HORREUR</option>
                <option value="ARTS">ARTS</option>
                <option value="LITTÉRATURE D'AFFAIRES">
                  LITTÉRATURE D'AFFAIRES
                </option>
                <option value="CONTE DE FÉE">CONTE DE FÉE</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col w-auto">
            <label for="Lectora" class="pb-5"
              >Lectorat visé
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <select
              name=""
              id="Lectora"
              class="border-2 p-2 text-sm font-medium"
              v-model="Target"
              required
            >
              <option value="Quel est votre public principal ?">
                Quel est votre public principal ?
              </option>
              <option value="Enfant (8-13 ans)">Enfant (8-13 ans)</option>
              <option value="Young Adult/Ados (13-18 ans)">
                Young Adult/Ados (13-18 ans)
              </option>
              <option value="New Adult/Jeunes Adultes (18-25 ans)">
                New Adult/Jeunes Adultes (18-25 ans)
              </option>
              <option value="Adultes (plus de 25 ans)">
                Adultes (plus de 25 ans)
              </option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="titre" class="pb-5"
              >Titre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <input
              type="text"
              id="titre"
              class="border-2 p-2 text-sm font-medium"
              v-model="Title"
              required
            />
          </div>
          <div class="flex flex-col">
            <label for="Description " class="pb-5"
              >Description
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <textarea
              class="border-2 h-48 p-3 overflow-hidden text-sm"
              id="Description "
              maxlength="600"
              v-model="Description"
              required
            ></textarea>
          </div>
        </div>
      </div>
      <div
        class="w-5/6 lg:w-1/2 text-sm lg:mr-[108px] mx-auto flex justify-between text-white py-10"
      >
        <Annuler></Annuler>
        <template v-if="this.id_book">
          <button
            @click="EditBook"
            class="font-semibold p-2 font-medium px-6 rounded-md bg-sky-600"
          >
            Passer
          </button>
        </template>
        <template v-else>
          <button
            @click="AddBook"
            class="font-semibold p-2 font-medium px-6 rounded-md bg-sky-600"
          >
            Passer
          </button>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
// import { defineComponent } from '@vue/composition-api'
import Annuler from "../components/box/botton_annuler.vue";
import axios from "axios";
export default {
  name: "",
  components: {
    Annuler,
  },
  data() {
    return {
      Category: "",
      Language: "",
      Target: "",
      Title: "",
      Description: "",
      couverture: "",
      id_user: localStorage["id_user"],
      id_book: this.$route.query.book,
      who: true,
    };
  },
  mounted() {
    this.com();
    if (this.id_book) {
      this.getBook();
    }
    
  },
  methods: {

    uploadImage(evt, index) {
      let formData = new FormData();
      let imgFile = evt.target.files[0];

      if (imgFile === undefined) return null;

      let ext = imgFile.name.split(".").pop();
      if (ext == "jpg" || ext == "png" || ext == "jpeg") {
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
              this.couverture = uniqName;
            }
          })
          .catch(console.error);
      } else {
        alert("Vous ne pouvez pas télécharger ce fichier");
      }
    },
    async AddBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("category_book", this.Category);
      bodyFormData.append("Langage", this.Language);
      bodyFormData.append("classification", this.Target);
      bodyFormData.append("titre_book", this.Title);
      bodyFormData.append("Description", this.Description);
      bodyFormData.append("couverture", this.couverture);
      bodyFormData.append("id_user", this.id_user);
      if (bodyFormData) {
        await axios({
          method: "POST",
          url: "http://attic.local/Book/create_book",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data) {
                localStorage.setItem("Id_book", response.data);
                this.id_book = response.data;
                this.$router.push("/Write?book=" + this.id_book);
              } else {
                alert("");
              }
            }
          })
          .catch((error) => {});
      }
    },
    getBook() {
      let formData = new FormData();
      formData.append("id_user", this.id_user);
      formData.append("id_book", this.id_book);

      axios({
        method: "POST",
        url: "http://attic.local/Book/getOneBook",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.Category = response.data.category_book;
              this.Language = response.data.Langage;
              this.Target = response.data.classification;
              this.Title = response.data.titre_book;
              this.Description = response.data.Description;
              this.couverture = response.data.couverture;
            }
          }
        })

        .catch((error) => {
          alert(error.status);
        });
    },
    async EditBook() {
      let bodyFormData = new FormData();
      bodyFormData.append("category_book", this.Category);
      bodyFormData.append("Langage", this.Language);
      bodyFormData.append("classification", this.Target);
      bodyFormData.append("titre_book", this.Title);
      bodyFormData.append("Description", this.Description);
      bodyFormData.append("couverture", this.couverture);
      bodyFormData.append("id_user", this.id_user);
      bodyFormData.append("id_book", this.id_book);
      if (bodyFormData) {
        await axios({
          method: "POST",
          url: "http://attic.local/Book/EditBook",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data == true) {
                this.$router.push("/Write?book=" + this.id_book);
              } else {
                alert("");
              }
            }
          })
          .catch((error) => {});
      }
    },
    com() {
      this.who = this.$store.getters.popupShow;
      if (this.who != true) {
        router.push({ path: "/" });
      }
    },
    
  },
};
</script>
