<template>
  <button
    @click="go_back"
    class="font-semibold text-white p-2 font-medium px-6 rounded-md bg-red-600"
  >
    Annuler
  </button>
</template>

<script>
export default {
  name: "Annuler",
  methods: {
    go_back() {
      window.history.back();
    },
  },
};
</script>
