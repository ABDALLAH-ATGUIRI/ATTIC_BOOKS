<template>
  <div>
     <div class="mx-auto flex justify-around w-2/3 lg:w-4/5 items-center">
      <div
        class="bg-white h-10 w-10 px-8 rounded-full text-4xl flex align-center snap-y justify-center font-bold text-sky-500"
      >
       &LeftArrow;
      </div>
      <div class="w-full">
        <div class="overflow-x-scroll flex gap-12">
          <book></book>
          <book></book>
          <book></book>
          <book></book>
          <book></book>
          <book></book>
          <book></book>
          <book></book>
        </div>
      </div>

      <div
        class="bg-white h-10 w-10 px-8 rounded-full text-4xl flex align-center snap-y justify-center font-bold text-sky-500"
      >
        &RightArrow;
      </div>
    </div>
  </div>
</template>

<script>
import book from "./box/book.vue";

export default {
  name: "Suggestions",
  components: {
    book,
  },
};
</script>
<style lang="css" scoped>
.overflow-x-scroll::-webkit-scrollbar {
  display: none;
}
</style>
