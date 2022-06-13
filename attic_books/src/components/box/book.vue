<template>
  <div class="flex justify-between w-full flex-nowrap drop-shadow-2xl">
    <div class="relative group w-[200px] h-72 overflow-hidden bg-black m-auto">
      <img
        class="object-cover w-full h-full transform duration-700 backdrop-opacity-100"
        :src="`/src/assets/uploads/` + coverture"
      />
      <div
        class="absolute w-full h-full shadow-2xl opacity-20 transform duration-500 inset-y-full group-hover:-inset-y-0"
      ></div>
      <div
        class="absolute bg-gradient-to-b from-sky-900 w-full h-full transform duration-500 inset-y-3/4 group-hover:-inset-y-0"
      >
        <div class="absolute w-full flex place-content-center">
          <h2
            class="capitalize font-serif font-bold text-xl text-center shadow-2xl text-white mt-3"
          >
            {{ title }}
          </h2>
        </div>
        <div class="absolute w-full flex place-content-center mt-20">
          <p class="font-sans text-sm w-4/5 text-white mt-5">
            Ce livre est classé sous {{ category }} , s'adresse aux
            {{ classification }}
          </p>
        </div>
        <router-link :to="'/Read/?book=' + Id_book">
          <button
            class="absolute bottom-4 bg-white text-black font-bold rounded-sm h-10 w-full"
          >
            Lisez
          </button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "coverture", "category", "Id_book", "classification"],
  setup() {},
};
</script>
