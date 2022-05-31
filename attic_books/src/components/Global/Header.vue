<template>
  <Popover class="top-0 inset-x-0 transition transform origin-top-right">
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
          class="hidden md:flex pr-20 justify-end items-center"
          aria-label="Global"
        >
          <div class="md:space-x-8 w-full justify-between">
            <router-link to="/">Accueil</router-link>

            <router-link to="/Write"> Nouveau livre </router-link>

            <router-link to="/Profile"> Profil </router-link>
            <router-link to="/"> ... </router-link>
            <button
              @click="conn = !conn"
              v-if="compte === 'Connexion'"
              class="conn-button w-auto text-black px-4"
            >
              {{ this.compte }}
            </button>
            <button
              v-else
              @click="logout"
              class="conn-button w-auto text-black px-4"
            >
              {{ this.compte }}
            </button>
          </div>
        </nav>
        <div class="pr-20 md:hidden">
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
    <div class="lg:hidden">
      <div
        class="md:hidden lg:hidden drop-shadow-xl bg-sky-600 transform transition duration-500 ease-in-out"
        :class="{ ' -translate-y-72': !open, ' h-0': !open }"
      >
        <div class="p-5 flex text-white font-bold items-center justify-evenly">
          <router-link to="/">
            <img
              class="w-12 shadow-xl"
              src="../../assets/icons/home.png"
              alt=""
            />
          </router-link>
          <router-link to="/Contact">
            <img
              class="w-12 shadow-xl"
              src="../../assets/icons/writing.png"
              alt=""
            />
          </router-link>
          <router-link class="w-12" to="/Profil">
            <img
              class="w-12 shadow-xl"
              src="../../assets/icons/user.png"
              alt=""
            />
          </router-link>
          <button @click="conn = !conn" v-if="compte === 'Connexion'">
            <img
              class="w-12 shadow-xl"
              src="../../assets/icons/key.png"
              alt=""
            />
          </button>
          <button @click="logout" v-else>
            <img
              class="w-12 shadow-xl"
              src="../../assets/icons/exit.png"
              alt=""
            />
          </button>
        </div>
      </div>
      <div class="drop-shadow-lg">
        <search></search>
      </div>
    </div>
  </Popover>
  <div
    v-if="conn == true"
    class="fixed w-full tsrons flex justify-center h-[120vh] absolute z-40"
  >
    <div
      class="absolute min-w-[370px] rounded-lg md:w-1/2 lg:w-4/12 shadow-lg self-center top-16 bg-white pt-6"
    >
      <div
        class="flex flex-col min-w-0 break-words justify-between bg-blueGray-200 border-0"
      >
        <div
          @click="conn = !conn"
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
// @ is an alias to /src
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import search from "../../components/box/bar-search.vue";
import connexion from "./login.vue";
// import { MenuIcon, XIcon } from "@heroicons/vue/outline";

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
      conn: false,
    };
  },
  created() {
    this.popupShow();
  },
  methods: {
    popupShow() {
      if (localStorage["user-info"]) {
        this.compte = "Se déconnecter";
      } else {
        this.compte = "Connexion";
      }
    },
    logout() {
      localStorage.clear();
      location.reload();
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
