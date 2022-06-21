<template>
  <div class="mt-10 flex flex-col mx-auto">
    <router-link
      :to="'/Profile/?Author=' + author_id"
      class="flex flex-col justify-between items-center"
    >
      <div class="w-16 h-16">
        <img
          class="rounded-full w-full h-full"
          :src="`/src/assets/uploads/` + author_pro"
          alt=""
        />
      </div>

      <span
        class="text-nowrap text-center text-lg my-6 text-gray-500 font-bold w-48"
        >@{{ author_name }}</span
      >
    </router-link>

    <label
      class="container max-w-[250px] self-center flex text-white font-bold rounded-full h-10"
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
</template>

<script>
export default {
  name: "Author",
  props: ["author_id", "author_name", "author_pro", "author"],
  data() {
    return {
      hidde: true,
    };
  },
};
</script>
<style lang="css">
/* * {
  overflow: hidden;
} */
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
