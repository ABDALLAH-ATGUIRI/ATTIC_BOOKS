<template>
  <div>
    <div
      class="bg-sky-500 w-5/6 rounded-xl mx-auto flex py-16 items-center justify-around"
    >

      <div class=" flex flex-col lg:flex-row w-10/12 items-center justify-center">
        <div class="lg:w-1/2 ">
         <book class="self-center"/>
        </div>

        <div class="flex flex-col h-80 justify-around text-white">
          <p class="text-sm">
            Le narrateur, un jeune enfant, décrit la vie et les relations
            parfois compliquées des membres d'une famille regroupée autour de sa
            grand-tante Félicie, sur un vaste domaine terrien du sud de la
            Touraine dans les années qui suivent la guerre franco-allemande de
            1870.
          </p>
          <div class=" flex flex-col w-full pt-5 items-center lg:flex-row justify-between">
            <div class="flex w-64 text-sm justify-between">
              <div class="flex justify-evenly items-center w-1/4">
                <img
                  class="w-5"
                  src="../assets/icons/vision-partagee (1).png"
                  alt=""
                />
                <span>40M</span>
              </div>
              <div class="flex justify-evenly items-center w-1/4">
                <img class="w-4" src="../assets/icons/favori.png" alt="" />
                <span>25M</span>
              </div>
              <div class="flex justify-evenly items-center w-1/3">
                <span>par&nbsp;:&nbsp;@AyaAria</span>
              </div>
            </div>
            <button class="cta self-end text-white">
              <span class="hover-underline-animation  text-white text-sm">
                plus de détails -></span
              >
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<!-- **************************************************************************************************************************************** -->


<script>
import book from "./box/book.vue";

export default {
  name: "Suggestions",
  components: {
    book,
  },
};
</script>

<!-- ********************************************************************************************************************************************************* -->


<style lang="css" scoped>
.cta span {
  padding-top: 8px;
  padding-bottom: 6px;
  letter-spacing: 4px;
  text-transform: uppercase;
}

.cta svg {
  transform: translateX(-8px);
  transition: all 0.3s ease;
}

.cta:hover svg {
  transform: translateX(0);
}

.cta:active svg {
  transform: scale(0.9);
}

.hover-underline-animation {
  position: relative;
  padding-bottom: 20px;
}

.hover-underline-animation:after {
  content: "";
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 1.5px;
  bottom: 0;
  left: 0;
  background-color: #000000;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.cta:hover .hover-underline-animation:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}
</style>
