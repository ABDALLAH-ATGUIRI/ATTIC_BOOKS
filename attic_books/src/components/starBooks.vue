<template>
  <div
    class="flex lg:flex-row snap-center snap-always flex-col items-center justify-around max-h-screen h-full py-12"
  >
    <div class="lg:w-1/3 drop-shadow-2xl">
      <div class="flex justify-start items-center w-full drop-shadow-2xl">
        <div
          class="relative group w-44 h-64 md:w-48 mx-8 md:h-72 overflow-hidden bg-black m-auto"
        >
          <img
            class="object-cover w-full h-full transform duration-700 backdrop-opacity-100"
            :src="`/src/assets/uploads/` + coverture"
          />
        </div>
      </div>
    </div>

    <div
      class="flex flex-col max-h-screen lg:px-10 h-full mt-10 lg:mt-0 justify-around text-white"
    >
      <h1
        class="capitalize font-serif font-bold text-xl md:text-3xl text-center text-white mb-5"
      >
        {{ title }}
      </h1>
      <p class="md:text-md text-sm max-w-[600px] leading-6">
        {{ description }}
      </p>
      <div
        class="flex flex-col w-full gap-8 pt-6 items-center md:flex-row justify-between"
      >
        <router-link
          :to="'/Profile/?Author=' + Id_user"
          class="flex justify-center items-center"
        >
          <div class="w-10 h-10">
            <img
              class="rounded-full w-full h-full"
              :src="`/src/assets/uploads/` + profile"
              alt=""
            />
          </div>
          <span class="text-nowrap text-md text-gray-300 font-bold w-48"
            >&nbsp;&nbsp;{{ Author }}</span
          >
        </router-link>

        <div class="flex justify-between w-44 items-center">
          <div class="flex gap-2 items-center">
            <img class="w-6 h-6" src="../assets/icons/view.png" alt="views" />
            <span>40M</span>
          </div>
          <template v-if="Aime">
            <div class="flex gap-2 items-center">
              <img
                class="w-5 h-5"
                src="../assets/icons/like.png"
                alt="likes"
                @click="Aime = !Aime"
              />
              <span>25M</span>
            </div>
          </template>
          <template v-else>
            <div class="flex gap-2 items-center">
              <img
                class="w-7 h-7"
                src="../assets/icons/love (1).png"
                alt="likes"
                @click="Aime = !Aime"
              />
              <span>25M</span>
            </div>
          </template>
        </div>

        <routerLink
          :to="'/Read/?book=' + Id_book"
          class="flex items-center cta text-white"
        >
          <span class="hover-underline-animation text-white text-md">
            plus&nbsp;de&nbsp;détails&nbsp;&RightArrow;</span
          >
        </routerLink>
      </div>
    </div>
  </div>
</template>

<!-- **************************************************************************************************************************************** -->
<script>
export default {
  name: "starBooks",
  props: [
    "title",
    "coverture",
    "category",
    "Id_book",
    "classification",
    "description",
    "Author",
    "profile",
    "Id_user",
    "Aimes",
  ],
  data() {
    return {
      Aime: true,
    };
  },
  setup() {},
};
</script>

<!-- ********************************************************************************************************************************************************* -->

<style lang="css" scoped>
.cta {
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: bold;
}

.cta svg {
  transform: translateX(-8px);
  transition: all 0.3s ease;
}

.cta:hover svg {
  transform: translateX(0);
}

.cta:active svg {
  transform: scale(0.9);
}

.hover-underline-animation {
  position: relative;
  /* padding-bottom: 5px; */
}

.hover-underline-animation:after {
  content: "";
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 1.5px;
  bottom: 0;
  left: 0;
  background-color: rgb(0, 0, 0);
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.cta:hover .hover-underline-animation:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}
</style>
