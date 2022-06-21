<template>
  <header>
    <div
      class="relative bg-sky-600 font-semibold self-center text-white flex items-center justify-between md:pl-10"
    >
      <router-link to="/">
        <img
          id="logo"
          class="pt-2 w-48 sm: h-20"
          src="../assets/test.png"
          alt="logo"
        />
      </router-link>

      <nav class="flex pr-20 justify-end items-center" aria-label="Global">
        <div class="md:space-x-8 w-full flex items-center justify-between">
          <div class="m-0">
            <div class="ml-3 relative">
              <div class="flex justify-between w-44 items-center">
                <MenuButton
                  class="max-w-xs bg-gray-800 rounded-full cursor-pointer flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                  @click="open_pro = !open_pro"
                >
                  <span class="sr-only">Open user menu</span>

                  <img
                    class="h-12 w-12 rounded-full cursor-pointer"
                    :src="'/src/assets/uploads/' + pro_image"
                    alt=""
                  />
                </MenuButton>
                <div class="flex flex-col">
                  <span class="text-sm">{{ name }}</span>
                  <span class="text-gray-300 text-xs font-bold">@admin</span>
                </div>
              </div>
              <div
                enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
              >
                <div
                  class="origin-top-right absolute z-40 mt-5 w-36 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                  v-if="open_pro === true"
                >
                  <span
                    @click="logout"
                    class="block px-4 text-center py-2 cursor-pointer text-sm text-red-700"
                  >
                    Se déconnecter
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main class="bg-sky-100 min-h-screen">
    <div class="flex flex-col md:flex-row">
      <div
        id="main"
        class="main-content flex-1 overflow-y-auto px-10 pb-24 md:pb-5"
      >
        <div class="mt-10 w-full mx-auto">
          <div
            class="rounded-t-lg bg-gradient-to-r from-blue-500 to-sky-700 p-4 shadow text-xl text-white"
          >
            <h1 class="font-bold pl-2">Analytique</h1>
          </div>
        </div>

        <div class="flex flex-wrap">
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <div
              class="border-b-4 border-green-600 rounded-lg p-5 shadow-xl hover:shadow-lg"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">
                    TOTAL DES LIVRES
                  </h2>
                  <p class="font-bold text-3xl">
                    {{ CountAllBooks }}
                    <span class="text-green-500"
                      ><i class="fas fa-caret-up"></i
                    ></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <div
              class="border-b-4 border-pink-500 rounded-lg shadow-xl hover:shadow-lg p-5"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">
                    Total des livres publiés
                  </h2>
                  <p class="font-bold text-3xl">
                    {{ CountPubBooks }}
                    <span class="text-pink-500"
                      ><i class="fas fa-exchange-alt"></i
                    ></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <div
              class="to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl hover:shadow-lg p-5"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">...</h2>
                  <p class="font-bold text-3xl">
                    {{ 0 }}
                    <span class="text-yellow-600"
                      ><i class="fas fa-caret-up"></i
                    ></span>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <div
              class="border-b-4 border-indigo-500 rounded-lg shadow-xl hover:shadow-lg p-5"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">
                    total d'auteurs
                  </h2>
                  <p class="font-bold text-3xl">{{ CountAuthors }}</p>
                </div>
              </div>
            </div> 
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
          
            <div
              class="border-b-4 border-blue-500 rounded-lg shadow-xl hover:shadow-lg p-5"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">
                    total Lecteurs
                  </h2>
                  <p class="font-bold text-3xl">{{ CountReaders }}</p>
                </div>
              </div>
            </div>
           
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            
            <div
              class="border-b-4 border-red-500 rounded-lg shadow-xl hover:shadow-lg p-5"
            >
              <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-sky-600">
                    Liste des bannis
                  </h2>
                  <p class="font-bold text-3xl">
                    {{ CountBannis }}<i class="fas fa-caret-up"></i>
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="w-11/12 my-10 mx-auto">
      <Users></Users>
    </div>
  </main>
</template>
<script>
import axios from "axios";
import Users from "../components/Admin/AllUsers.vue";

export default {
  name: "DashboardAdmin",
  data() {
    return {
      id_admin: "",
      CountAuthors: "",
      CountReaders: "",
      CountPubBooks: "",
      CountAllBooks: "",
      CountBannis: "",
      id_admin: localStorage["id_admin"],
      name: localStorage["Admin_f_name"] + "-" + localStorage["Admin_l_name"],
      pro_image: localStorage["Admin_pro_image"],
      open_pro: false,
    };
  },
  components: {
    Users,
  },
  mounted() {
    this.conn();
    this.Analytique();
  },
  methods: {
    conn() {
      this.id_admin = localStorage["id_admin"];
      if (this.id_admin) {
      } else {
        this.$router.push({ path: "/ConnAdmin" });
      }
    },
    logout() {
      localStorage.clear();

      this.$store.commit("popupShow");
      router.push({ path: "/" });
      this.com();
    },
    Analytique() {
      axios({
        method: "post",
        url: "http://attic.local/Admin/Analytique",
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.CountAuthors = response.data.Authors["COUNT(Id_user)"];
              this.CountReaders = response.data.Readers["COUNT(*)"];
              this.CountAllBooks = response.data.Books["COUNT(*)"];
              this.CountPubBooks = response.data.PubBooks["COUNT(*)"];
              this.CountBannis = response.data.Bannis["COUNT(*)"];
            } else {
              router.push({ path: "/" });
            }
          }
        })
        .catch((error) => {
          window.history.back();
        });
    },
  },
};
</script>
