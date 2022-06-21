<template>
  <div class="flex md:flex-row flex-col-reverse   items-center mb-6 my-4">
    <span class="p-1 text-gray-500 font-extrabold">{{ number }}</span>
    <div
      class="felx md:w-full w-20 h-20 relative md:h-48 overflow-y-auto border-gray-500 border-2 active:border-blue-500"
    >
      <div
        class="w-6 h-6 absolute p-1 right-0 hover:w-8 z-30 duration-300 ease-in-out"
        @click="delChapiter"
      >
        <img src="../../assets/icons/trash.png" alt="" />
      </div>
      <div class="md:text-[12px] text-[4px] py-2 w-2/3 mx-auto">
        <h1 class="font-bold py-1 break-words text-center">{{ title }}</h1>
        <p class="md:text-[8px] text-[4px] break-words h-full">{{ body }}</p>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "Writing",
  props: ["title", "body", "number", "index", "id_book"],
  component: {},

  data() {
    return {
      addPage: "",
      Page: [],
      who: true,
    };
  },
  methods: {
    delChapiter() {
      let bodyFormData = new FormData();
      bodyFormData.append("id_book", JSON.stringify(this.id_book));
      bodyFormData.append("index", JSON.stringify(this.index));

      if (bodyFormData) {
        axios({
          method: "POST",
          url: "http://attic.local/Book/delChapters",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
          .then((response) => {
            if (response.status == 200) {
              this.$store.commit("delChapiter", this.index);
            }
          })
          .catch((error) => {});
      }
    },
    com() {
      this.who = this.$store.getters.popupShow;
      if (this.who != true) {
        router.push({ path: "/" });
      }
    },
  },
};
</script>
<style lang="css">
.overflow-y-scroll::-webkit-scrollbar {
  width: 5px;
}
</style>
