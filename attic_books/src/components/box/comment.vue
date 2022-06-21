<template>
  <div class="flex justify-between w-full mt-10">
    <router-link
      :to="'/Profile/?Author=' + id_user"
      class="flex items-center"
      >
      <div class="w-8 h-8">
        <img
          class="rounded-full w-full h-full"
          :src="`/src/assets/uploads/` + pro_image"
          alt=""
        />
      </div>
      <div class="flex flex-col justify-center ml-5">
        <span class="text-nowrap text-sm text-gray-700 font-bold">{{
          name
        }}</span>
        <span class="text-gray-400 text-xs">sept. 21, 2021</span>
      </div>
    </router-link>

    <div class="">
      <MenuButton
        class="rounded-full cursor-pointer flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
        @click="btn = !btn"
      >
        <div class="flex justify-around pt-1 w-8">
          <span class="w-1 h-1 rounded-full bg-gray-500 font-bold"></span>
          <span class="w-1 h-1 rounded-full bg-gray-500 font-bold"></span>
          <span class="w-1 h-1 rounded-full bg-gray-500 font-bold"></span>
        </div>
      </MenuButton>

      <div
        enter-active-class="transition ease-out duration-100"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <div
          class="bg-gray-100 flex flex-col text-xs gap-2 p-5 py-3 absolute right-0 z-40 mt-5 w-24   rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
          v-if="btn"
        >
          <span class="cursor-pointer">Modifier</span>
          <span class="text-red-700 cursor-pointer">Supprimer</span>
        </div>
      </div>
    </div>
  </div>
  <div class="text-sm break-words text-gray-500 w-11/12 mr-0 ml-14 pt-4">
    <p>
      {{ commenter }}
    </p>
  </div>
</template>

<script>
export default {
  name: "",
  props: ["commenter", "name", "pro_image", "id_user" , "Id_commenter"],
  data() {
    return {
      btn: false,
    };
  },
};
</script>
