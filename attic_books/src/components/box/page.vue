<template>
  <div class="relative w-3/4 h-screen ml-auto overflow-y-scroll">
    <div
      class="w-2/3 font-medium shadow-2xl border-black mx-auto mt-32 divide-x-16"
    >
      <div class="w-5/6 py-10 mx-auto text-base">
        <div>
          <div class="flex flex-col">
            <label for="titre" class="pb-5"
              >Titre du chapitre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              >
            </label>
            <input
              type="text"
              id="titre"
              class="border-2 p-2 text-sm font-medium"
              maxlength="50"
              v-model="this.$store.state.slide.title"
              @change="addToCart()"
            />
          </div>
          <div class="flex flex-col pt-6">
            <label for="Description " class="pb-5"
              >Chapitre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <textarea
              class="border-2 h-screen p-3 overflow-hidden text-sm"
              id="Description "
              v-model="this.$store.state.slide.body"
              @change="addToCart()"
            ></textarea>
          </div>
          <input type="hidden" v-model="this.$store.state.slide.index" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  // props: ["title", "body", "index"],
  data() {
    return {
      title: "",
      body: "",
      index: "",
    };
  },
  methods: {
    show() {
      this.title = this.$store.state.slide.title;
      this.body = this.$store.state.slide.body;
      this.index = this.$store.state.slide.index;

      // console.log(this.title, this.body, this.index);
    },
    addToCart() {
      this.show();
      const item = {
        title: this.title,
        body: this.body,
        index: this.index,
      };
      this.$store.commit("addCart", item);
     
    },
  },
  watch: {
    title() {
      this.addToCart();
    },
    body() {
      this.addToCart();
    },
  },
};
</script>
