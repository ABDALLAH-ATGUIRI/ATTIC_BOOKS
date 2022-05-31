<template>
  <div class="md:w-11/12 mx-auto">
    <div
      class="w-full text-xl font-medium shadow-2xl border-black mt-20 divide-x-16 ml-auto"
    >
      <div class="py-6 pl-16 font-bold">
        <span
          class="w-full text-center tracking-widest mx-auto divide-x hover-underline-animation"
          >Détails de l'histoire</span
        >
      </div>
      <hr class="w-[320px] bg-sky-500 h-2 rounded-r-xl" />
      <hr />
      <div class="md:flex h-full">
        <div class="w-1/5 min-w-[250px] mt-10 md:mt-36 mx-auto">
          <label
            for="image"
            class="bg-gray-300 h-[400px] rounded-sm hover-shadow-lg flex py-8 items-center justify-around"
          >
            <div class="flex flex-col items-center">
              <img src="../assets/icons/add-image.png" class="w-14" alt="" />
              <span class="text-xs">Ajouter une couverture</span>
            </div>
          </label>
          <input type="file" hidden id="image" />
        </div>
        <div
          class="md:w-3/5 w-11/12 h-full mx-auto pt-20 h-screen flex flex-col justify-around"
        >
          <!-- <div class="flex flex-col">
            <label for="Personnages" class="pb-5">Personnages Principaux <span class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs ">!</span></label>
            <input type="text" class="w-11/12 border-4 p-3" id="Personnages" />
          </div> -->

          <div class="md:flex justify-between w-full">
            <div class="flex flex-col md:w-1/2 md-mr-5">
              <label for="Catégorie " class="pb-5 f"
                >Catégorie
                <span
                  class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                  >!</span
                ></label
              >
              <select
                name=""
                id="Catégorie"
                class="border-2 p-2 text-sm font-medium"
              >
                <option value="">Catégorie</option>
                <option value="">POÉSIE</option>
                <option value="">FICTION HISTORIQUE</option>
                <option value="">CLASSIQUE</option>
                <option value="">AMOUR</option>
                <option value="">DRAME</option>
                <option value="">HORREUR</option>
                <option value="">ARTS</option>
                <option value="">LITTÉRATURE D'AFFAIRES</option>
                <option value="">CONTE DE FÉE</option>
              </select>
            </div>
            <div class="flex flex-col md:w-1/2 md:ml-5">
              <label for="Langue" class="pb-5"
                >Langue
                <span
                  class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                  >!</span
                ></label
              >
              <select
                name=""
                id="Langue"
                class="border-2 p-2 text-sm font-medium"
              >
                <option value="" class="hiddend">Catégorie</option>
                <option value="">POÉSIE</option>
                <option value="">FICTION HISTORIQUE</option>
                <option value="">CLASSIQUE</option>
                <option value="">AMOUR</option>
                <option value="">DRAME</option>
                <option value="">HORREUR</option>
                <option value="">ARTS</option>
                <option value="">LITTÉRATURE D'AFFAIRES</option>
                <option value="">CONTE DE FÉE</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col w-auto">
            <label for="Lectora" class="pb-5"
              >Lectorat visé
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <select
              name=""
              id="Lectora"
              class="border-2 p-2 text-sm font-medium"
            >
              <option value="">Quel est votre public principal ?</option>
              <option value="">Enfant (8-13 ans)</option>
              <option value="">Young Adult/Ados (13-18 ans)</option>
              <option value="">New Adult/Jeunes Adultes (18-25 ans)</option>
              <option value="">Adultes (plus de 25 ans)</option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="titre" class="pb-5"
              >Titre
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <input
              type="text"
              id="titre"
              class="border-2 p-2 text-sm font-medium"
            />
          </div>
          <div class="flex flex-col">
            <label for="Description " class="pb-5"
              >Description
              <span
                class="bg-gray-400 w-20 px-2 font-extrabold rounded-full text-white text-xs"
                >!</span
              ></label
            >
            <textarea
              class="border-2 h-48 p-3 overflow-hidden text-sm"
              id="Description "
              maxlength="600"
            ></textarea>
          </div>
        </div>
      </div>
      <div class="w-5/6 lg:w-1/2 text-sm lg:mr-[108px] mx-auto flex justify-between text-white py-10">
        <button
          class="bg-white font-semibold p-2 font-medium px-6 rounded-md bg-red-600"
        >
          Annuler
        </button>
        <button
          class="bg-white font-semibold p-2 font-medium px-6 rounded-md bg-sky-600"
        >
          Passer
        </button>
      </div>
    </div>

    <!-- <hr /> -->
  </div>
</template>
