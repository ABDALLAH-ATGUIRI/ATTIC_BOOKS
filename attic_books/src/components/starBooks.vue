<template>
  <div class="flex flex-col md:flex-row w-10/12 items-center justify-center">
    <div class="h-1/2 lg:w-1/2 drop-shadow-2xl">
      <book class="self-center" />
    </div>

    <div class="flex flex-col  max-h-screen pt-10 justify-around text-white">
      <p class="md:text-md text-sm leading-6">
        Le narrateur, un jeune enfant, décrit la vie et les relations parfois
        compliquées des membres d'une famille regroupée autour de sa grand-tante
        Félicie, sur un vaste domaine terrien du sud de la Touraine dans les
        années qui suivent la guerre franco-allemande de 1870. Le narrateur, un
        jeune enfant, décrit la vie et les relations parfois compliquées des
        membres d'une famille regroupée autour de sa grand-tante Félicie, sur un
        vaste domaine terrien du sud de la Touraine dans les années qui suivent
        la guerre franco-allemande de 1870.
      </p>
      <div
        class="flex flex-col w-full gap-8 pt-6 items-center lg:flex-row justify-between"
      >
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
            <span class="">par&nbsp;:&nbsp;@AyaAria</span>
          </div>
        </div>
        <button class="flex items-center cta text-white">
          <span class="hover-underline-animation text-white text-sm">
            plus de détails &RightArrow;</span
          >
        </button>
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
.cta {
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: bold;
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
  padding-bottom: 6px;
}

.hover-underline-animation:after {
  content: "";
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 1.5px;
  bottom: 0;
  left: 0;
  background-color: rgb(194 65 12);
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.cta:hover .hover-underline-animation:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}
</style>
