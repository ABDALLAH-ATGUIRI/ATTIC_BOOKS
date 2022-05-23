<template>
  <div class="first-view">
    <div class="inner-como">
      <div>
        <img class="img-view" src="../assets/image 1.png" alt="" />
      </div>

      <div>
        <div>
          <div class="setion-motivation">
            <h2>Bienvenue à ATTIC</h2>
            <p>
              lire davantage est le meilleur moyen d’apprendre de nouvelles
              choses, de développer des connaissances et de trouver de nouvelles
              idées
            </p>
          </div>
          <form action="" class="bar-search">
            <select name="Catégorie" class="category" id="">
              <option value="">Catégorie</option>
              <option value=""></option>
              <option value=""></option>
            </select>
            <select name="Auteure" class="category" id="">
              <option value="">Auteure</option>
              <option value=""></option>
              <option value=""></option>
            </select>
            <div class="search-book">
              <label for="search">
                <img
                  src="../assets/icons/search.png"
                  id="icon-search"
                  alt="search"
                />
              </label>
              <input
                type="text"
                name="search"
                id="search"
                class="category input-book"
                placeholder="Entrez le nom du Livre ici"
              />
            </div>
            <button class="search-butt">Search</button>
          </form>
          <div></div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="css" scoped>
.img-view {
  max-width: 55%;
  height: 550px;
  position: absolute;
  right: 0;
  top: -12%;
  left: 54%;
}
.first-view {
  position: relative;
  display: flex;
}
.search-book {
  display: flex;
}
#icon-search {
  width: 20px;
}
.search-book input {
  height: 50px;
  border: none;
  border-radius: 0 8px 8px 0;
}
.search-book label {
  border-width: 5px;
  border-radius: 8px 0 0 8px;
  padding:  5% 0 5% 5% ;
  background-color: #f1f1f1;
  
}

.search-butt {
  color: white;
  background: #10acef;
  border: none;
  border-radius: 8px;
  height: 50px;
  padding: 1.5%;
  font-weight: 700;
}

.bar-search {
  position: absolute;
  display: flex;
  justify-content: space-around;
  align-items: center;
  background: white;
  width: 70%;
  height: 90px;
  border-radius: 8px;
  bottom: 10%;
  margin-left: 5%;
}
.inner-como {
  align-self: center;
  width: 100%;
  background: #10acef;
  height: 400px;
  border-radius: 35px;
  margin-top: 2%;
}
.category {
  width: 200px;
  height: 50px;
  background: #f1f1f1;
  color: black;
  text-align: center;
  border: none;
  border-radius: 8px;
  font-weight: bold;
}
.setion-motivation {
  width: 50%;
  padding: 5%;
  color: white;
}
.setion-motivation h2 {
  font-weight: lighter;
  font-size: 32px;
}
.setion-motivation p {
  font-weight: 400;
  padding-top: 3%;
}
</style>
