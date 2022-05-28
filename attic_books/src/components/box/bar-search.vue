<template>
  <form
    action=""
    class="rounded-lg w-full lg:w-3/4 h-22 p-5 absolute md:flex justify-around bg-white bottom-10 lg:ml-16 mx-auto align-center"
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
    <select
      name="Catégorie"
      class="rounded-md bg-gray-100 md:w-1/5 py-3 px-auto text-center hidden md:block"
      id=""
    >
      <option value="">Catégorie</option>
      <option value=""></option>
      <option value=""></option>
    </select>
    <select
      name="Auteure"
      class="rounded-md bg-gray-100 md:w-1/5 py-3 px-auto text-center hidden md:block"
      id=""
    >
      <option value="">Auteure</option>
      <option value=""></option>
      <option value=""></option>
    </select>

    <button class="bg-sky-500 p-2 px-5 rounded-md text-white hidden md:block">
      Search
    </button>
  </form>
</template>
