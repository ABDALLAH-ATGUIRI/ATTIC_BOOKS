<template>
  <div class="top-0 inset-x-0 transition transform origin-top-right">
    <div>
      <div
        class="relative bg-sky-600 font-semibold self-center text-white flex items-center justify-between md:pl-10"
      >
        <router-link to="/">
          <img
            id="logo"
            class="pt-2 w-48 sm: h-20"
            src="../../assets/test.png"
            alt="logo"
          />
        </router-link>

        <nav
          class="hidden lg:flex pr-20 justify-end items-center"
          aria-label="Global"
        >
          <div class="md:space-x-8 w-full flex items-center justify-between">
            <router-link to="/">Accueil</router-link>
            <router-link to="/Details" v-if="compte === true">
              Nouveau livre
            </router-link>
            <router-link to="/Search"> Chercher </router-link>
            <button
              @click="
                this.$store.state.popupConn = !this.$store.state.popupConn
              "
              v-if="compte === false"
              class="conn-button w-auto text-black px-4"
            >
              Connexion
            </button>

            <div v-else class="m-0">
              <div class="ml-3 relative">
                <div>
                  <MenuButton
                    class="max-w-xs bg-gray-800 rounded-full cursor-pointer flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    @click="open_pro = !open_pro"
                  >
                    <span class="sr-only">Open user menu</span>
                    <img
                      class="h-12 w-12 rounded-full cursor-pointer"
                      :src="'/src/assets/uploads/' + image"
                      alt=""
                    />
                  </MenuButton>
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
                    class="origin-top-right absolute z-40 -right-12 mt-5 w-36 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    v-if="open_pro === true"
                  >
                    <div v-for="item in userNavigation" :key="item.name">
                      <router-link
                        :to="item.href"
                        :class="[
                          active ? 'bg-gray-100' : '',
                          'block px-4 py-2 text-sm text-gray-700',
                        ]"
                        >{{ item.name }}</router-link
                      >
                    </div>
                    <span
                      @click="logout"
                      class="block px-4 py-2 cursor-pointer text-sm text-red-700"
                    >
                      Se déconnecter
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <div class="pr-20 lg:hidden">
          <button
            class="text-white-500 w-30 h-20 relative focus:outline-none"
            @click="open = !open"
          >
            <span class="sr-only">Open main menu</span>
            <div
              class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2"
            >
              <span
                aria-hidden="true"
                class="block absolute h-1 w-7 rounded-xl bg-current transform transition duration-500 ease-in-out"
                :class="{ 'rotate-45': open, ' -translate-y-2': !open }"
              ></span>
              <span
                aria-hidden="true"
                class="block absolute h-1 w-7 rounded-xl bg-current raduid transform transition duration-500 ease-in-out"
                :class="{ 'opacity-0': open }"
              ></span>
              <span
                aria-hidden="true"
                class="block absolute h-1 w-7 rounded-xl bg-current transform transition duration-500 ease-in-out"
                :class="{ '-rotate-45': open, ' translate-y-2': !open }"
              ></span>
            </div>
          </button>
        </div>
      </div>
    </div>

    <div
      class="lg:hidden drop-shadow-xl bg-sky-600 transform transition duration-500 ease-in-out"
      :class="{ ' -translate-y-72': !open, ' h-0': !open }"
    >
      <div class="p-5 flex text-white font-bold items-center justify-evenly">
        <router-link to="/" class="w-1/4 flex justify-center">
          <img
            class="w-12 h-12 shadow-xl"
            src="../../assets/icons/home.png"
            alt="Home"
          />
        </router-link>
        <router-link class="w-1/4 flex justify-center" to="/Profil">
          <img
            class="w-12 h-12 shadow-xl"
            src="../../assets/icons/magnifying-glass.png"
            alt=""
          />
        </router-link>

        <button
          @click="this.$store.state.popupConn = !this.$store.state.popupConn"
          v-if="compte === false"
          class="w-1/4 flex justify-center"
        >
          <img
            class="w-12 h-12 shadow-xl"
            src="../../assets/icons/key.png"
            alt=""
          />
        </button>
        <div v-else class="flex w-3/4 items-center justify-around">
          <router-link to="/Details" class="w-auto">
            <img
              class="w-12 h-12 shadow-xl"
              src="../../assets/icons/writing.png"
              alt="write"
            />
          </router-link>
          <router-link to="/Profile" class="w-auto">
            <img
              class="h-12 w-12 bg-gray-500 rounded-full"
              :src="'/src/assets/uploads/' + image"
              alt="Profil"
            />
          </router-link>

          <button @click="logout" class="w-auto">
            <img
              class="w-12 h-12 shadow-xl"
              src="../../assets/icons/exit.png"
              alt="logout"
            />
          </button>
        </div>
      </div>
    </div>
  </div>
  <div
    v-if="this.$store.state.popupConn == true"
    class="fixed w-full tsrons flex justify-center h-[120vh] z-40"
  >
    <div
      class="absolute min-w-[370px] rounded-lg md:w-1/2 lg:w-4/12 shadow-lg self-center top-16 bg-white pt-6"
    >
      <div
        class="flex flex-col min-w-0 break-words justify-between bg-blueGray-200 border-0"
      >
        <div
          @click="this.$store.state.popupConn = !this.$store.state.popupConn"
          class="font-semibold pointer-events cursor-pointer text-xl mx-8 self-end"
        >
          X
        </div>
        <connexion class="px-5"></connexion>
      </div>
    </div>
  </div>
</template>

<script>
import { Popover } from "@headlessui/vue";
import search from "../../components/box/bar-search.vue";
import connexion from "./login.vue";
import router from "../../router";

export default {
  name: "AppHeader",
  components: {
    Popover,
    search,
    connexion,
  },
  data() {
    return {
      compte: "",
      open: false,
      conn: this.$store.state.popupConn,
      open_pro: false,
      image: localStorage["pro_image"],
      userNavigation: [
        { name: "votre profil", href: "/Profile" },
        // { name: "Settings", href: "#" },
      ],
    };
  },
  created() {
    this.com();
  },
  methods: {
    com() {
      this.compte = this.$store.getters.popupShow;
    },
    logout() {
      localStorage.clear();

      this.$store.commit("popupShow");
      router.push({ path: "/" });
      this.com();
    },
  },
};
</script>

<style>
.tsrons {
  background-color: rgba(0, 0, 0, 0.719);
}
.conn-button {
  /* padding: 5%; */
  background-color: white;
  height: 40px;
  width: 110px;
  border: none;
  border-radius: 8px;
  color: --S-color;
  font-weight: 600;
}
</style>
