<template>
  <header>
    <!--Nav-->
    <nav
      aria-label="menu nav"
      class="bg-sky-600 px-2 shadow-xl mt-0 h-auto z-10 fixed w-full top-0"
    >
      <div class="flex flex-wrap items-center">
        <div
          class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white"
        >
           <img class="pt-2 w-1/2 sm: h-20" src="../assets/test.png" alt="logo">
          
        </div>

        <div
          class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2"
        >
          <span class="relative w-full">
            <input
              aria-label="search"
              type="search"
              id="search"
              placeholder="Search"
              class="w-full bg-sky-900 text-white transition border border-transparent focus:outline-none focus:border-sky-400 rounded py-3 px-2 pl-10 appearance-none leading-normal"
            />
            <div class="absolute search-icon" style="top: 1rem; left: 0.8rem">
              <svg
                class="fill-current pointer-events-none text-white w-4 h-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                ></path>
              </svg>
            </div>
          </span>
        </div>
        <div class="w-1/3">

        </div>


      </div>
    </nav>
  </header>

  <main>
    <div class="flex fixed h-1/2 flex-col md:flex-row">
      <nav aria-label="alternative nav">
        <div
          class="bg-sky-600 shadow-xl fixed bottom-0 mt-20 md:relative md:h-screen z-10 w-full md:w-64 content-center"
        >
          <div
            class="md:mt-12 md:w-64 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between"
          >
            <ul
              class="list-reset flex flex-row md:flex-col py-5 mt-20 px-1 md:px-2 text-center md:text-left"
            >
              <li class="mr-3 flex-1">
                <a
                  href="#"
                  class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-sky-800 hover:border-pink-500"
                >
                  <i class="fas fa-tasks pr-0 md:pr-3"></i
                  ><span
                    class="pb-1 md:pb-0 text-xs md:text-base text-sky-400 md:text-sky-200 block md:inline-block"
                    >Tasks</span
                  >
                </a>
              </li>
              <li class="mr-3 flex-1">
                <a
                  href="#"
                  class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-sky-800 hover:border-purple-500"
                >
                  <i class="fa fa-envelope pr-0 md:pr-3"></i
                  ><span
                    class="pb-1 md:pb-0 text-xs md:text-base text-sky-400 md:text-sky-200 block md:inline-block"
                    >Messages</span
                  >
                </a>
              </li>
              <li class="mr-3 flex-1">
                <a
                  href="#"
                  class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600"
                >
                  <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i
                  ><span
                    class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block"
                    >Analytics</span
                  >
                </a>
              </li>
              <li class="mr-3 flex-1">
                <a
                  href="#"
                  class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-sky-800 hover:border-red-500"
                >
                  <i class="fa fa-wallet pr-0 md:pr-3"></i
                  ><span
                    class="pb-1 md:pb-0 text-xs md:text-base text-sky-400 md:text-sky-200 block md:inline-block"
                    >Payments</span
                  >
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="">
        <div
          id="main"
          class="main-content flex-1 overflow-y-auto px-10 h-screen bg-sky-100  md:mt-20 pb-24 md:pb-5"
        >
          <div class=" mt-10 w-full mx-auto">
            <div
              class="rounded-t-3xl  bg-gradient-to-r from-blue-500 to-sky-700 p-4 shadow text-2xl text-white"
            >
              <h1 class="font-bold pl-2">Analytics</h1>
            </div>
          </div>

          <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-green-600">
                      <i class="fa fa-wallet fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">
                      Total Revenue
                    </h2>
                    <p class="font-bold text-3xl">
                      $3249
                      <span class="text-green-500"
                        ><i class="fas fa-caret-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-pink-600">
                      <i class="fas fa-users fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">
                      Total Users
                    </h2>
                    <p class="font-bold text-3xl">
                      249
                      <span class="text-pink-500"
                        ><i class="fas fa-exchange-alt"></i
                      ></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-yellow-600">
                      <i class="fas fa-user-plus fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">New Users</h2>
                    <p class="font-bold text-3xl">
                      2
                      <span class="text-yellow-600"
                        ><i class="fas fa-caret-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-blue-600">
                      <i class="fas fa-server fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">
                      Server Uptime
                    </h2>
                    <p class="font-bold text-3xl">152 days</p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-indigo-600">
                      <i class="fas fa-tasks fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">To Do List</h2>
                    <p class="font-bold text-3xl">7 tasks</p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Metric Card-->
              <div
                class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5"
              >
                <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-red-600">
                      <i class="fas fa-inbox fa-2x fa-inverse"></i>
                    </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-sky-600">Issues</h2>
                    <p class="font-bold text-3xl">
                      3
                      <span class="text-red-500"
                        ><i class="fas fa-caret-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/Metric Card-->
            </div>
          </div>
        </div>
        <div class="flex flex-row flex-wrap flex-grow mt-2">
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div
                class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
              >
                <h class="font-bold uppercase text-sky-600">Graph</h>
              </div>
              <div class="p-5">
                <canvas
                  id="chartjs-7"
                  class="chartjs"
                  width="undefined"
                  height="undefined"
                ></canvas>
              </div>
            </div>
            <!--/Graph Card-->
          </div>

          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div
                class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
              >
                <h2 class="font-bold uppercase text-sky-600">Graph</h2>
              </div>
              <div class="p-5">
                <canvas
                  id="chartjs-0"
                  class="chartjs"
                  width="undefined"
                  height="undefined"
                ></canvas>
              </div>
              <!--/Graph Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Graph Card-->
              <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                  class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
                >
                  <h2 class="font-bold uppercase text-sky-600">Graph</h2>
                </div>
                <div class="p-5">
                  <canvas
                    id="chartjs-1"
                    class="chartjs"
                    width="undefined"
                    height="undefined"
                  ></canvas>
                </div>
              </div>
              <!--/Graph Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Graph Card-->
              <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                  class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
                >
                  <h5 class="font-bold uppercase text-sky-600">Graph</h5>
                </div>
                <div class="p-5">
                  <canvas
                    id="chartjs-4"
                    class="chartjs"
                    width="undefined"
                    height="undefined"
                  ></canvas>
                </div>
              </div>
              <!--/Graph Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Table Card-->
              <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                  class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
                >
                  <h2 class="font-bold uppercase text-sky-600">Graph</h2>
                </div>
                <div class="p-5">
                  <table class="w-full p-5 text-sky-700">
                    <thead>
                      <tr>
                        <th class="text-left text-blue-900">Name</th>
                        <th class="text-left text-blue-900">Side</th>
                        <th class="text-left text-blue-900">Role</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Obi Wan Kenobi</td>
                        <td>Light</td>
                        <td>Jedi</td>
                      </tr>
                      <tr>
                        <td>Greedo</td>
                        <td>South</td>
                        <td>Scumbag</td>
                      </tr>
                      <tr>
                        <td>Darth Vader</td>
                        <td>Dark</td>
                        <td>Sith</td>
                      </tr>
                    </tbody>
                  </table>

                  <p class="py-2"><a href="#">See More issues...</a></p>
                </div>
              </div>
              <!--/table Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
              <!--Advert Card-->
              <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                  class="bg-gradient-to-b from-sky-300 to-sky-100 uppercase text-sky-800 border-b-2 border-sky-300 rounded-tl-lg rounded-tr-lg p-2"
                >
                  <h2 class="font-bold uppercase text-sky-600">Advert</h2>
                </div>
                <div class="p-5 text-center"></div>
              </div>
              <!--/Advert Card-->
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
</template>
<script>
export default {};
</script>
