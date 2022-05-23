
<template>
<nav>
    <AppHeader/>
</nav>

  <RouterView />
</template>


<style lang="css">

*{
  padding: 0px;
  margin: 0px;
  text-decoration: none;
  font-family: "poppins", sans-serif;
}



</style>

<script >
import { RouterLink, RouterView } from 'vue-router';
import AppHeader from '@/components/Header.vue';

export default{
name: "App",
components:{
  AppHeader,
}
}
</script>