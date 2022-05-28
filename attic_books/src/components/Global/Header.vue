<template>
  <Popover class="top-0 inset-x-0 transition transform origin-top-right">
    <div>
      <div
        class="relative bg-sky-500 font-semibold self-center text-white flex items-center justify-between pl-10"
      >
        <div>
          <a href="#" id="ref">
            <span class="sr-only">Workflow</span>
            <img
              id="logo"
              class="h-16 md:h-28 pt-2 sm:h-20"
              src="../../assets/test.png"
              alt="logo"
            />
          </a>
        </div>
        <nav
          class="hidden md:flex w-full justify-end items-center"
          aria-label="Global"
        >
          <div class="md:space-x-8">
            <router-link to="/">Accueil</router-link>
            <router-link to="/"> Auteurs </router-link>
            <router-link to="/"> Mes rendez-vous </router-link>
          </div>
          <div class="w-2/6 flex justify-center">
            <button class="conn-button text-black px-2">Connexion</button>
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
    <div class="relative h-[130px] lg:hidden">
      <search></search>
    </div>
    <transition>
      <PopoverPanel
        focus
        class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
      >
        <div
          class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"
        >
          <div class="px-7 bg-white-500 flex items-center justify-between">
            <div>
              <img
                class="h-20 sm:h-20"
                alt="Vue logo"
                src="../assets/logo.png"
              />
            </div>
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
                    :class="{ 'rotate-45': open, ' -translate-y-1.5': !open }"
                  ></span>
                  <span
                    aria-hidden="true"
                    class="block absolute h-1 w-7 rounded-xl bg-current raduid transform transition duration-500 ease-in-out"
                    :class="{ 'opacity-0': open }"
                  ></span>
                  <span
                    aria-hidden="true"
                    class="block absolute h-1 w-7 rounded-xl bg-current transform transition duration-500 ease-in-out"
                    :class="{ '-rotate-45': open, ' translate-y-1.5': !open }"
                  ></span>
                </div>
              </button>
            </div>
          </div>

          <div class="h-48 p-5 flex flex-col items-center justify-evenly">
            <router-link to="/">Accueil</router-link>
            <router-link to="/Contact">Réservez</router-link>
            <router-link to="/Profil">
              <span>Mes rendez-vous</span>
            </router-link>
            <router-link to="">
              <span @click="logout()">{{ this.compte }}</span>
            </router-link>
            <router-link to="/Create">
              <span>{{ this.compte }}</span>
            </router-link>
          </div>
          <button class="conn-button text-black px-2">Connexion</button>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</template>

<script>
// @ is an alias to /src
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import search from "../../components/box/bar-search.vue";
// import { MenuIcon, XIcon } from "@heroicons/vue/outline";

export default {
  name: "AppHeader",
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    search,
  },
  data() {
    return {
      compte: "",
      open: true,
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
      // history.back()
      this.$router.push("/");
    },
  },
};
</script>
<style>
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

<!-- <template>
<Popover
            focus
            class="absolute z-10 top-0 inset-x-0 transition transform origin-top-right md:hidden"
          >
  <div class="header bg-sky-500 relative lg:p-4 sm:p-4 px-4 sm:px-6 lg:px-12">
    <nav
      class="relative font-semibold self-center text-white flex items-center justify-between sm:h-10"
      aria-label="Global"
    >
      <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
        <div class="flex items-center justify-between w-full md:w-auto">
          <a href="#" id="ref">
            <span class="sr-only">Workflow</span>
            <img
              id="logo"
              class="h-24 sm:h-20"
              src="../../assets/test.png"
              alt="logo"
            />
          </a>
          
          <div class="-mr-2 flex items-center md:hidden">
          
          <Popover.Button
            class="flex justify-between flex-col h-10  p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
          >
              <span class="w-8 h-1 bg-white rounded-md "></span>
              <span class="w-8 h-1 bg-white rounded-md"></span>
              <span class="w-8 h-1 bg-white rounded-md"></span>
          </Popover.Button>
            <div class="-mr-2">
              <Popover.Button
                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
              >
                <span class="sr-only">Close main menu</span>
                <XIcon
                  class="h-6 w-6"
                  aria-hidden="true"
                  @click="showPopUp = false"
                /> 
               </Popover.Button>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden md:block md:ml-10 md:space-x-8">
        <router-link to="/">Accueil</router-link>
        <router-link to="/">
          <span>Auteurs</span>
        </router-link>
        <router-link to="/">
          <span>Mes rendez-vous</span>
        </router-link>
        <router-link to="">
          <span @click="logout()">{{ this.compte }}</span>
        </router-link>

        <router-link to="/Create">
          <span>{{ this.compte }}</span>
        </router-link>
      </div>
      <button class="conn-button text-black px-2">Connexion</button>
    </nav>
  </div>

    <div
      class="rounded-lg shadow-md bg-sky-500 ring-1 ring-black ring-opacity-5 overflow-hidden"
    >
      <div class="px-7 w-full bg-white-500 flex items-center justify-between">
        <div>
          <img
            class="h-20 sm:h-20"
            alt="Vue logo"
            src="../../assets/test.png"
          />
        </div>

        <div class="-mr-2 bg-white flex items-center md:hidden">
          <Popover.Button class="">
            <span class="sr-only">Open main menu</span>
            <MenuIcon class="h-6 w-6" aria-hidden="true" />
          </Popover.Button>
        </div>
        <Popover.Button
            class="flex justify-between flex-col  p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500"
             @click="showPopUp = false"
          >
              <span class=" text-white rounded-md text-3xl font-bold ">X</span>
          </Popover.Button>
      </div>

      <div
        class="h-48 p-5 font-semibold flex flex-col items-center justify-evenly"
      >
        <router-link to="/">Accueil</router-link>
        <router-link to="/">Réservez</router-link>
        <router-link to="/">
          <span>Mes rendez-vous</span>
        </router-link>
        <router-link to="">
          <span @click="logout()">{{ this.compte }}</span>
        </router-link>
        <router-link to="/">
          <span>{{ this.compte }}</span>
        </router-link>
      </div>
    </div>
  </Popover>
</template>
<script>
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
// import { MenuIcon, XIcon } from "@heroicons/vue/outline";
// import { AnnotationIcon, ArrowCircleUpIcon} from '@vue-hero-icons/outline'

export default {
  name: "Header",
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    //MenuIcon,
    //XIcon,
  },
  data() {
    return {
      compte: "",
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
      // history.back()
      this.$router.push("/");
    },
  },
};
</script>

<style lang="css" scoped>
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
</style> -->
