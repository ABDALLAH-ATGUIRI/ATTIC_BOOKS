<template>
  <nav>
    <AppHeader />
  </nav>
  <RouterView />
  <footer>
    <Footer />
  </footer>
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
import AppHeader from "@/components/Global/Header.vue";
import Footer from "@/components/Global/Footer.vue";
// import login from "@/components/Global/login.vue";
// import SingUp from "@/components/Global/SingUp.vue";



export default {
  name: "App",
  components: {
    AppHeader,
    Footer,
    // login,
    // SingUp
  },
};
</script>
