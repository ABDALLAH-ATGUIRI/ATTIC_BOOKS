<template>
  <form
    action=""
    class="md:rounded-lg h-36 md:h-auto w-full p-4 flex md:flex-row flex-col justify-around align-center"
  >
    <div class="flex w-full md:w-auto">
      <label
        for="search"
        class="flex align-center rounded-l-md w-8 py-2 bg-gray-100"
      >
        <img
          class="p-2"
          src="../../assets/icons/search.png"
          id="icon-search"
          alt="search"
        />
      </label>
      <input
        type="text"
        name="search"
        id="search"
        class="bg-gray-100 rounded-r-md hover:border-none p-2 w-full md:w-auto"
        placeholder="Entrez le nom du Livre ici"
      />
    </div>
    <div class="flex md:w-2/5 gap-8 justify-between">
      <select
        name="Catégorie"
        class="rounded-md bg-gray-100  py-3 px-auto text-center w-1/2 md:block"
        id=""
      >
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
      <select
        name="Auteure"
        class="rounded-md bg-gray-100 py-3 px-auto w-1/2 text-center md:block"
        id=""
      >
        <option value="">Auteure</option>
        <option value=""></option>
        <option value=""></option>
      </select>
    </div>

    <button class="bg-sky-600 p-2 px-5 rounded-md text-white hidden md:block">
      Search
    </button>
  </form>
</template>
