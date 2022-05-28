<template>
  <div class="gap-20 grid sm:grid-cols-2 lg:grid-cols-4 w-11/12 align-center mx-auto">
    <auteur />
    <auteur />
    <auteur />
    <auteur />
  </div>
</template>

<script>
import auteur from "./box/auteur.vue";

export default {
  name: "Suggestions",
  components: {
    auteur,
  },
};
</script>
