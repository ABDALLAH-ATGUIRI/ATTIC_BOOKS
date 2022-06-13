<template>
  <div
    class="w-full fixed z-40 absolute bg-sky-600 h-20 top-0 pr-10 flex items-center justify-between"
  >
    <div class="pl-2 text-white flex items-center justify-evenly md:w-1/4">
      <span class="font-bold text-4xl cover cursor-pointer" @click="$router.go(-1)"> &lang; </span>
      <div class="flex flex-col text-center">
        <span class="text-xs text-gray-300"
          >Ajouter une description sur le livre
        </span>
        <span class="md:text-2xl font-bold tracking-widest"
          >Livre sans titre</span
        >
      </div>
    </div>
  </div>
</template>

