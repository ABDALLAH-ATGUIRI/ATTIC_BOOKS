<template>
  <div
    class="w-screen h-screen flex flex-col items-center justify-center bg-sky-600"
  >
    <div class="w-96 h-48">
      <img class="w-full h-full" src="../assets/test.png" alt="" />
    </div>
    <h2 class="font-bold text-white text-xl md:text-3xl lg:text-4xl pb-10">
      Bienvenue dans votre tableau de bord
    </h2>

    <div
      class="p-4 z-10 w-5/6 md:w-1/2 bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 lg:p-8"
    >
      <div class="space-y-6">
        <div>
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900"
            >E-mail</label
          >
          <input
            type="email"
            name="email"
            id="email"
            v-model="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="nom@company.com"
            required=""
          />
        </div>
        <div>
          <label
            for="password"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Mot de passe</label
          >
          <input
            type="password"
            name="password"
            id="password"
            v-model="password"
            placeholder="••••••••"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required=""
          />
        </div>
        <button
          type="submit"
          class="w-full text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          @click="Login()"
        >
          Connexion
        </button>
      </div>
    </div>
  </div>

</template>

<script>
import axios from "axios";
export default {
  name: "connexion",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  components: {
    
  },
  methods: {
    Login() {
      let formdata = new FormData();
      formdata.append("email", this.email);
      formdata.append("password", this.password);
      axios({
        method: "post",
        url: "http://attic.local/User/connAdmin",
        data: formdata,
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              // localStorage.setItem("user-info", JSON.stringify(response.data));
              localStorage.setItem("id_admin", response.data.id_utilisateur);
              localStorage.setItem("Admin_email", response.data.email);
              localStorage.setItem("Admin_f_name", response.data.f_name);
              localStorage.setItem("Admin_l_name", response.data.l_name);
              localStorage.setItem("Admin_pro_image", response.data.pro_image);
              this.$router.push({ path: "/Admin" });
            } else {
              alert("Vérifiez que l'e-mail ou le mot de passe est incorrect");
             
            }
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
