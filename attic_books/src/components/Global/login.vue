<template>
  <section class="w-full tsrons flex justify-center h-screen absolute z-40">
    <div
      class="absolute min-w-[370px] rounded-lg md:w-1/2 lg:w-4/12 shadow-lg self-center top-16 bg-white pt-6"
    >
      <div
        class="flex flex-col min-w-0 break-words  justify-between bg-blueGray-200 border-0"
      > <div class="font-semibold pointer-events cursor-pointer text-xl mx-8 self-end">X</div>
        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-blueGray-500 text-lg font-bold">
              Se connecter au ATTIC BOOKS
            </h6>
          </div>
          <div class="btn-wrapper text-center">
            <button
              class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
              type="button"
            >
              <img
                alt="..."
                class="w-6 mr-1"
                src="../../assets/icons/facebook.png"
              />Facebook
            </button>
            <button
              class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
              type="button"
            >
              <img
                alt="..."
                class="w-5 mr-1"
                src="https://demos.creative-tim.com/notus-js/assets/img/google.svg"
              />Google
            </button>
          </div>
          <hr class="mt-6 border-b-1 border-blueGray-300" />
        </div>
        <div class="block h-[350px] px-4 lg:px-10 py-10 pt-0">
          <form class="flex flex-col justify-between h-full">
            <div class="relative w-full mb-3">
              <input
                type="email"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="Email"
              />
            </div>
            <div class="relative w-full mb-3">
              <input
                type="Mot de pass"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="Password"
              />
            </div>
            <div>
              <label class="inline-flex items-center cursor-pointer"
                ><input
                  id="customCheckLogin"
                  type="checkbox"
                  class="form-checkbox bg-sky-500 border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                /><span class="ml-2 text-sm font-semibold text-blueGray-600"
                  >Remember me</span
                ></label
              >
            </div>
            <div class="text-center mt-6">
              <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full bg-sky-500 ease-linear transition-all duration-150"
                type="button"
              >
                Se connecter
              </button>
            </div>
            <div class="text-sm pt-10">
              <span class="text-sky-400 cursor-pointer">Mot de passe oublié? </span>
              <p>
                Vous n'avez pas de compte ?
                <span class="text-sky-500 cursor-pointer">S'inscrire</span>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script >


</script>
<style scoped>
.tsrons {
  background-color : rgba(0, 0, 0, 0.719);
}
</style>