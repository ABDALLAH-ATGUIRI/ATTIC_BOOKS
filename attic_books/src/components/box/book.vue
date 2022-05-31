<template>
  <div class="flex justify-between w-full flex-nowrap drop-shadow-2xl">
    <div class="relative group w-48 mx-8 h-72 overflow-hidden bg-black m-auto">
      <img
        class="object-cover w-full h-full transform duration-700 backdrop-opacity-100"
        src="../../assets/books/943215.jpg"
      />
      <div
        class="absolute w-full h-full shadow-2xl opacity-20 transform duration-500 inset-y-full group-hover:-inset-y-0"
      ></div>
      <div
        class="absolute bg-gradient-to-t from-black w-full h-full transform duration-500 inset-y-3/4 group-hover:-inset-y-0"
      >
        <div class="absolute w-full flex place-content-center">
          <p
            class="capitalize font-serif font-bold text-2xl text-center shadow-2xl text-white mt-10"
          >
           ROBIN HOBB
          </p>
        </div>
        <div class="absolute w-full flex place-content-center mt-20">
          <p class="font-sans text-center text-sm w-4/5 font-bold text-white mt-5">
            Collaborative effort of a group to achieve a common goal the most
            effective and efficient way!
          </p>
        </div>
        <button
          class="absolute bottom-4 bg-white text-black font-bold rounded-sm h-10 w-full"
        >
          Lisez
        </button>
      </div>
    </div>
  </div>
</template>
