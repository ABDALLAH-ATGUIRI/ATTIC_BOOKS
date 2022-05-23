<template>
  <div class="star-book">
    <div class="titer">
      <h1>Par Nos Stars ></h1>
    </div>
    <div class="setion-motivation">
      <div class="sp-scroll"> > </div>
      <div class="info-sb">
        <div>
          <img class="book" src="../assets/books/943215.jpg" alt="" />
          <div class="book-info">
            <div>
              <img class="icon" src="../assets/icons/vision-partagee (1).png" alt="">
              <span>40M</span>
            </div>
            <div>
              <img class="icon" src="../assets/icons/etoile-de-signet.png" alt="">
              <span>25M</span>
            </div>
            <div>
              <span>par : @AyaAria</span>
            </div>
          </div>
        </div>
        
        <div class="cont-des">
          <h1>ROBIN HOBB</h1>
          <p>
            لكل من جفت مخيلته بسبب ضغوط الواقع! لكل من لديه أسلوب جيد لكن لا يجد
            الأفكار! لكل من قاده فضوله لكتابي المتواضع هذا ! مرحبا بكم! سأضع هنا
            كل الأفكار التي استغنيت عن تحويلها لقصة بسبب ظرف أو أخر و يمكنكم
            استعمال...
          </p>
          <button>plus de détails</button>
        </div>
      </div>
      <div class="sp-scroll">></div>
    </div>
  </div>
</template>

<style lang="css" scoped>
  :root{
    --firstColor : #10acef; 
  }

.setion-motivation {
  align-self: center;
  width: 80%;
  height: 800px;
  background: #10acef;
  color: white;
  margin-right: auto;
  margin-left: auto;
  height: 450px;
  border-radius: 35px;
  margin-top: 2%;
  padding: 0 30px 0 30px;
  display: flex;
  align-items: center;
}
.book {
  height: 80%;
  width: 200px;
}
.book-info {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 10%;
  font-size: 12px;

}
.icon {
  width: 20px;
}
.info-sb {
  display: flex;
  align-items: center;
 padding: 3%;
 height: 80%;
}
.sp-scroll {
  font-size: 36px;
  font-weight: bold;
  color: #10acef;
  background-color: rgb(255, 255, 255);
  padding: 1%;
  border-radius: 100%;
  text-align: center;
  width:max-content

}
.cont-des {
  padding: 4%;
  height: 80%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  
}
.cont-des h1 {
 text-align: center;
 font-size: 32px;
}

.cont-des p {
  font-size: 20px;
}

.cont-des button {
  cursor: pointer;
  font-weight: 700;
  font-family: Helvetica,"sans-serif";
  transition: all .2s;
  padding: 10px 20px;
  border-radius: 100px;
  background: rgb(0, 102, 192);
  border: 1px solid transparent;
  display: flex;
  align-items: center;
  font-size: 15px;
  color: white;
  width: 20%;
}

.cont-des button:hover{
   background: var(--firstColor);
}

.cont-des button > svg {
 width: 34px;
 margin-left: 10px;
 transition: transform .3s ease-in-out;
}

.cont-des button:hover svg {
 transform: translateX(5px);
}

.cont-des button:active {
 transform: scale(0.95);
}


</style>
