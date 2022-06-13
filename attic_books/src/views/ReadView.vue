<template>
  <AppHeader></AppHeader>

  <div class="flex lg:flex-row flex-col mx-auto w-11/12 justify-evenly">
    <div class="w-3/5">
      <chapiter :title="title" :body="body"></chapiter>
    </div>
    <div class="w-1/5">
      <div class="min-w-[370px] rounded-md bg-orange-100 h-5/6">
        <div class="py-8 flex flex-col mt-20 mx-auto">
          <router-link
            :to="'/Profile/?Author=' + Id_user"
            class="flex flex-col justify-between items-center"
          >
            <div class="w-14 h-14">
              <img
                class="rounded-full w-full h-full"
                :src="`/src/assets/uploads/137276605.jpeg`"
                alt=""
              />
            </div>

            <span
              class="text-nowrap text-center text-lg my-6 text-gray-500 font-bold w-48"
              >Abdallah-Atguiri</span
            >
          </router-link>

          <label
            class="container w-1/2 self-center flex text-white font-bold rounded-full h-10"
            for="Suivre"
            @click="hidde = !hidde"
          >
            <div class="w-auto absolute text-white text-sm z-10" v-if="hidde">
              Suivre
            </div>
            <input id="Suivre " type="checkbox" />
            <div class="checkmark"></div>
          </label>
        </div>

        <div class="mt-4">
          <h1
            class="bg-sky-500 w-full text-lg text-center text-white font-bold py-4"
          >
            Commentaires
          </h1>

          <div class="px-6">
            <div class="flex items-center gap-5 pt-8">
              <div class="w-14 h-12">
                <img
                  class="rounded-full w-full h-full"
                  :src="`/src/assets/uploads/137276605.jpeg`"
                  alt=""
                />
              </div>
              <textarea
                name="comanter"
                class="w-full h-[50px] border-gray-400 border-2"
                id=""
                cols="30"
                rows="10"
              ></textarea>
            </div>
            <div class="flex flex-col justify-center">
              <div class="flex justify-between mt-10">
                <div class="flex items-center">
                  <div class="w-8 h-8">
                    <img
                      class="rounded-full w-full h-full"
                      :src="`/src/assets/uploads/137276605.jpeg`"
                      alt=""
                    />
                  </div>
                  <div class="flex flex-col justify-center ml-5">
                    <span class="text-nowrap text-sm text-gray-700 font-bold"
                      >Abdallah-Atguiri</span
                    >
                    <span class="text-gray-400 text-xs">sept. 21, 2021</span>
                  </div>
                </div>

                <div class="flex justify-around pt-1 w-8">
                  <span
                    class="w-1 h-1 rounded-full bg-gray-500 font-bold"
                  ></span>
                  <span
                    class="w-1 h-1 rounded-full bg-gray-500 font-bold"
                  ></span>
                  <span
                    class="w-1 h-1 rounded-full bg-gray-500 font-bold"
                  ></span>
                </div>
              </div>
              <div class="text-sm break-words text-gray-500 w-5/6 ml-auto pt-4">
                <p>
                  L'Épée de Shannara ou Le Glaive de Shannara (titre original :
                  The Sword of Shannara)
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppHeader from "../components/Global/Header.vue";
import Chapiter from "../components/box/chapiter.vue";
import Commanter from "../components/box/commanter.vue";
import Footer from "../components/Global/Footer.vue";
export default {
  name: "Read",
  data() {
    return {
      hidde: true,
    };
  },
  components: {
    AppHeader,
    Chapiter,
    Footer,
    Commanter,
  },
};
</script>

<style lang="css" scoped>
.container input {
  opacity: 1;
  -webkit-appearance: none;
  cursor: pointer;
  height: 40px;
  box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.5),
    10px 10px 15px rgba(0, 0, 70, 0.12);
  outline: none;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  transition: 0.5s;
  background-color: rgb(16, 172, 234);
  border-radius: 20px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.container input::after {
  transition: 0.5s;
  font-family: monospace;
  content: "";
  color: #7a7a7a;
  font-size: 25px;
  left: 0.45em;
  top: 0.25em;
  width: 0.5em;
  height: 0.75em;
  transform: rotate(45deg);
}

.container input:checked {
  box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.5),
    10px 10px 15px rgba(70, 70, 70, 0.12),
    inset -10px -10px 15px rgba(255, 255, 255, 0.5),
    inset 10px 10px 15px rgba(70, 70, 70, 0.12);
  transition: 0.5s;
}

.container input:checked::after {
  transition: 0.5s;
  border: solid #15e38a;
  border-width: 0 0.15em 0.15em 0;
  transform: rotate(45deg);
}
</style>
