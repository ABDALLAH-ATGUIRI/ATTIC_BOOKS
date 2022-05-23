<template>
  <div class="parent-bal">
    <div class="titer ">
      <h1>Des articles ></h1>
    </div>

    <div class="container">
      <div class="cat-img">
        <img src="../assets/Categorie/943173.jpg" alt="" />
      </div>
      <div class="cat-img">
        <img
          src="../assets/Categorie/jonathan-borba-3w3FqbxG0nc-unsplash 1.jpg"
          alt=""
        />
      </div>
      <div class="cat-img">
        <img
          src="../assets/Categorie/anthony-tran-YurBxVWdQ-A-unsplash 1.jpg"
          alt=""
        />
      </div>
      <div class="cat-img">
        <img
          src="../assets/Categorie/frank-holleman-VEoUWF2iQlQ-unsplash.jpg"
          alt=""
        />
      </div>
      <div class="cat-img">
        <img
          src="../assets/Categorie/image_processing20210423-11904-n6y5s2 1.jpg"
          alt=""
        />
      </div>

      <div class="cat-img">
        <img
          src="../assets/Categorie/AdobeStock_317601158_Preview 1.jpg"
          alt=""
        />
      </div>
    </div>
  </div>
</template>

<style lang="css">
.cat-img {
  width: 30%;
}
img{
    width: 100%;
    height: 100%;
}
.parent-bal {
  width: 85%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
}
.titer{
    text-align: center;
    padding: 5%;
    margin-bottom: 10px;
    font-size: 28px;
}
.container {
  display: flex;
  flex-wrap: wrap;
  row-gap: 5%;
height: 400px;
  justify-content: space-around;
}
</style>
