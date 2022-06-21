<template>
  <span id="above"></span>
  <!-- **********************************************************************LOGIN********************************************************************* -->
  <div id="login" v-if="conn == true">
    <div class="rounded-t mb-0 px-6 py-6">
      <div class="text-center mb-3">
        <h6 class="text-blueGray-500 text-lg font-bold">
          Se connecter au ATTIC BOOKS
        </h6>
      </div>
      <!-- <div class="btn-wrapper flex justify-around text-center">
        <button
          class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-6 py-2 rounded outline-none focus:outline-none mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
          type="button"
        >
          <img
            alt="..."
            class="w-8 mr-2"
            src="../../assets/icons/facebook (1).png"
          />Facebook
        </button>
        <button
          class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-6 py-2 rounded outline-none focus:outline-none mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
          type="button"
        >
          <img
            alt="..."
            class="w-8 mr-2"
            src="../../assets/icons/google.png"
          />Google
        </button>
      </div> -->
      <hr class="mt-6 border-b-1 border-blueGray-300" />
    </div>
    <div class="block h-[350px] px-4 lg:px-10 py-10 pt-0">
      <form class="flex flex-col justify-between h-full">
        <div class="relative w-full mb-3">
          <input
            type="email"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Email"
            v-model="email"
            required="required"
          />
        </div>
        <div class="relative w-full mb-3">
          <input
            type="password"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Password"
            v-model="password"
            required="required"
          />
        </div>
        <div>
          <label class="inline-flex items-center cursor-pointer"
            ><input
              id="customCheckLogin"
              type="checkbox"
              class="form-checkbox bg-sky-500 border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
            /><span class="ml-2 text-sm font-semibold text-blueGray-600"
              >Remember me</span
            ></label
          >
        </div>
        <div class="text-center mt-6">
          <button
            class="bg-sky-600 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full bg-sky-500 ease-linear transition-all duration-150"
            type="submit"
            @click="Login"
          >
            Se connecter
          </button>
        </div>
        <div class="text-sm pt-10">
          <span class="text-sky-400 cursor-pointer">Mot de passe oublié? </span>
          <p>
            Vous n'avez pas de compte ?
            <span class="text-sky-500 cursor-pointer" @click="conn = false"
              >S'inscrire</span
            >
          </p>
        </div>
      </form>
    </div>
  </div>
  <!-- *********************************************************************SIGNUP************************************************************* -->
  <div id="signup" v-else>
    <div class="rounded-t mb-0 px-6 py-6">
      <div class="text-center mb-3">
        <h6 class="text-blueGray-500 text-lg font-bold">
          S'inscrire au ATTIC BOOKS
        </h6>
      </div>
      <!-- <div class="btn-wrapper flex justify-around text-center">
        <button
          class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-6 py-2 rounded outline-none focus:outline-none mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
          type="button"
        >
          <img
            alt="..."
            class="w-8 mr-2"
            src="../../assets/icons/facebook (1).png"
          />Facebook
        </button>
        <button
          class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-6 py-2 rounded outline-none focus:outline-none mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
          type="button"
        >
          <img
            alt="..."
            class="w-8 mr-2"
            src="../../assets/icons/google.png"
          />Google
        </button>
      </div> -->
      <hr class="mt-6 border-b-1 border-blueGray-300" />
    </div>
    <div class="block h-[450px] px-4 lg:px-10 py-10 pt-0">
      <form class="flex flex-col justify-between h-full">
        <div class="flex justify-between w-full">
          <div class="relative w-full mb-3">
            <input
              type="text"
              class="border-0 px-3 mr-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              placeholder="Prénom"
              v-model="f_name"
              required="required"
            />
          </div>
          <div class="relative w-full mb-3">
            <input
              type="text"
              class="border-0 px-3 py-3 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              placeholder="Nom"
              v-model="l_name"
              required="required"
            />
          </div>
        </div>

        <div class="relative w-full mb-3">
          <input
            type="email"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Email"
            v-model="email"
            required="required"
          />
        </div>
        <div class="relative w-full mb-3">
          <input
            type="date"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Date d'anniversaire"
            v-model="naissance"
            required="required"
          />
        </div>
        <div class="relative w-full mb-3">
          <input
            type="password"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Mot de pass"
            v-model="password"
            required="required"
          />
        </div>
        <div class="relative w-full mb-3">
          <input
            type="password"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            placeholder="Confirmer mot de pass"
            v-model="conpassword"
            required="required"
          />
        </div>
        <div class="text-center mt-6">
          <button
            class="bg-sky-600 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full bg-sky-500 ease-linear transition-all duration-150"
            type="submit"
            @click="signUp"
          >
            Se connecter
          </button>
        </div>
        <div class="text-sm pt-5">
          <p>
            Vous avez déjà un compte ?
            <span class="text-sky-500 cursor-pointer" @click="conn = true">
              Connexion</span
            >
          </p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import router from "../../router";
export default {
  data() {
    return {
      conn: true,
      f_name: "",
      l_name: "",
      email: "",
      naissance: "",
      password: "",
      conpassword: "",
    };
  },
  mounted() {
    this.$router.push("#above");
  },
  methods: {
    async signUp(e) {
      e.preventDefault();

      if (this.password == this.conpassword) {
        await axios({
          method: "post",
          url: "http://attic.local/user/create",
          data: {
            nom: this.l_name,
            prenom: this.f_name,
            email: this.email,
            naissance: this.naissance,
            password: this.password,
            conpassword: this.conpassword,
          },
          headers: { "Content-Type": "multipart/raw" },
        })
          .then((response) => {
            if (response.status == 200) {
              if (response.data == true) {
                alert("Le processus d'inscription s'est terminé avec succès");
                return (this.conn = true);
              } else {
                alert("Ceci est l'email qui existe déjà");
              }
            }
          })
          .catch((error) => {
            alert(error.status);
          });
      } else {
        alert("mot de pass ne pas correct");
      }
    },

    async Login(e) {
      e.preventDefault();
      await axios({
        method: "post",
        url: "http://attic.local/user/read_One",
        data: {
          email: this.email,
          password: this.password,
        },
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data.id_utilisateur) {
              // localStorage.setItem("user-info", JSON.stringify(response.data));
              localStorage.setItem("id_user", response.data.id_utilisateur);
              localStorage.setItem("email", response.data.email);
              localStorage.setItem("f_name", response.data.f_name);
              localStorage.setItem("l_name", response.data.l_name);
              localStorage.setItem("naissance", response.data.naissance);
              localStorage.setItem("pro_image", response.data.pro_image);
              localStorage.setItem("bg_image", response.data.bg_image);

              location.reload();
            } else {
              alert(response.data);
            }

            // console.log(JSON.decod);
          }
        })
        .catch((error) => {
          alert(error.status);
        });
    },
  },
};
</script>
