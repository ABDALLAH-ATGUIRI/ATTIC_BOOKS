<template>
  <RouterView />
</template>

<style lang="css" scoped>
* {
  padding: 0px;
  margin: 0px;
  text-decoration: none;
  font-family: "poppins", sans-serif;
  overflow: hidden;
}

</style>

<script>
import { RouterLink, RouterView } from "vue-router";

// import login from "@/components/Global/login.vue";
// import SingUp from "@/components/Global/SingUp.vue";



export default {
  name: "App",
  components: {
    // AppHeader,
    // Footer,
    // login,
    // SingUp
  },
};
</script>
