<template>
  <main>
    <section class="sect-cn">
      <BienvenuVue />
    </section>
    <!-- <hr class="line" /> -->
    <section class="sect-cn">
      <CategoriesVue />
    </section>
    <!-- <hr class="line" /> -->
    <section class="sect-cn">
      <stareBook />
    </section>
  </main>
</template>
<style scoped>
.line {
  width: 90%;
}
.sect-cn {
  display: flex;
  justify-content: center;
  align-content: center;
  margin-top: 5%;
}

</style>

<script>
import BienvenuVue from "../components/Bienvenu.vue";
import CategoriesVue from "../components/Categories.vue";
import stareBook from "../components/starBooks.vue";

export default {
  name: "home",
  components: {
    BienvenuVue,
    CategoriesVue,
    stareBook,
  },
};
</script>
