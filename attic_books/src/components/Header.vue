<template>

  <div class="menu">
    <div class="greetings">
      <img id="logo" src="../assets/test.png" alt="" />
    </div>
    <ul class="menu-list">
      <li>
        <a href="../views/HomeView.vue">Accueil</a>
      </li>
      <li>
        <a href="">Auteurs</a>
      </li>
      <li>
        <a href="">Ma&nbsp;bibliothèque</a>
      </li>
      <li>
        <a href="">Rechercher</a>
      </li>
    </ul>
      <button class="conn-button">Connexio</button>
  </div>
</template>

<style lang="css" scoped>
.menu{
  max-width:100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 0 100px 0 70px;
  align-items: center;
  max-height: 80px;
  background-color: #10ACEF;
}
.menu-list{
  display: flex;
  width: 37%;
  justify-items: center;
  justify-content: space-between;
  list-style: none;
}
.conn-button{
  /* padding: 5%; */
  background-color: white;
  height: 40px;
  width: 110px;
  border: none;
  border-radius:8px ;
  color: --S-color ;
  font-weight: 600;

}
.menu-list li a{
  color:white;
  font-size: 18px;
  font-weight: 500;
}
#logo {
  width: 150px;
}
</style>

<script setup></script>
