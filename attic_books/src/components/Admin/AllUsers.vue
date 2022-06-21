<template>
  <div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-md text-left text-gray-500">
        <thead
          class="rounded-t-lg bg-gradient-to-r from-blue-500 to-sky-700 p-4 shadow text-xl text-white"
        >
          <tr>
            <th scope="col" class="px-6 py-3">profile</th>
            <!-- <th scope="col" class="px-6 py-3">Id</th> -->
            <th scope="col" class="px-6 py-3">Nom</th>
            <th scope="col" class="px-6 py-3">Prénom</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3 text-center">État</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b" v-for="user in AllUsers" :key="user.id">
            <td class="px-6 py-4">
              <div class="w-14 h-14 cursor-pointer">
                <router-link :to="'/Profile/?Author=' + user.id_utilisateur">
                  <img
                    class="w-full h-full rounded-full"
                    :src="`/src/assets/uploads/` + user.pro_image"
                    alt=""
                  />
                </router-link>
              </div>
            </td>
            <!-- <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              01
            </th> -->
            <td class="px-6 py-4">{{ user.l_name }}</td>
            <td class="px-6 py-4">{{ user.f_name }}</td>
            <td class="px-6 py-4">{{ user.email }}</td>
            <td class="px-6 py-4 relative text-center">
              <a href="#" class="font-medium text-blue-600 hover:underline"
                ><input
                  :id="user.l_name + '0000'"
                  :checked="user.banned == 1 ? true : false "
                  type="checkbox"
                  class="inpLock" />
                <label
                  class="btn-lock"
                  :for="user.l_name + '0000'"
                  @click="bannedUser(user.banned, user.id_utilisateur)"
                >
                  <svg width="36" height="40" viewBox="0 0 36 40">
                    <path
                      class="lockb"
                      d="M27 27C27 34.1797 21.1797 40 14 40C6.8203 40 1 34.1797 1 27C1 19.8203 6.8203 14 14 14C21.1797 14 27 19.8203 27 27ZM15.6298 26.5191C16.4544 25.9845 17 25.056 17 24C17 22.3431 15.6569 21 14 21C12.3431 21 11 22.3431 11 24C11 25.056 11.5456 25.9845 12.3702 26.5191L11 32H17L15.6298 26.5191Z"
                    ></path>
                    <path
                      class="lock"
                      d="M6 21V10C6 5.58172 9.58172 2 14 2V2C18.4183 2 22 5.58172 22 10V21"
                    ></path>
                    <path class="bling" d="M29 20L31 22"></path>
                    <path class="bling" d="M31.5 15H34.5"></path>
                    <path class="bling" d="M29 10L31 8"></path>
                  </svg> </label
              ></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Users",
  data() {
    return {
      AllUsers: [],
      banne: false,
    };
  },
  mounted() {
    this.getAllUsers();
  },
  methods: {
    async getAllUsers() {
      await axios({
        method: "POST",
        url: "http://attic.local/Admin/AllUsers",
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.AllUsers = response.data;
            }
          }
        })

        .catch((error) => {
          alert(error.status);
        });
    },
    bannedUser(banne, id_user) {
      let formdata = new FormData();
      formdata.append("banned", banne);
      formdata.append("id_user", id_user);
      axios({
        method: "POST",
        data: formdata,
        url: "http://attic.local/Admin/banned",
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
            }
          }
        })

        .catch((error) => {
          alert(error.status);
        });
    },
  },
};
</script>

<style lang="css" scoped>
/* From uiverse.io by @mobinkakei */
.btn-lock {
  position: absolute;
  top: calc(50% - 26px);
  left: calc(50% - 26px);
  display: inline-block;
  background: #13c06f;
  width: 64px;
  height: 64px;
  box-sizing: border-box;
  padding: 12px 0 0 18px;
  border-radius: 50%;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
}

.btn-lock svg {
  fill: none;
  transform: translate3d(0, 0, 0);
}

.btn-lock svg .bling {
  stroke: #fff;
  stroke-width: 2.5;
  stroke-linecap: round;
  stroke-dasharray: 3;
  stroke-dashoffset: 15;
  transition: all 0.3s ease;
}

.btn-lock svg .lock {
  stroke: #fff;
  stroke-width: 4;
  stroke-linejoin: round;
  stroke-linecap: round;
  stroke-dasharray: 36;
  transition: all 0.4s ease;
}

.btn-lock svg .lockb {
  fill: #fff;
  fill-rule: evenodd;
  clip-rule: evenodd;
  transform: rotate(8deg);
  transform-origin: 14px 20px;
  transition: all 0.2s ease;
}

.inpLock {
  display: none;
}

.inpLock:checked + label {
  background: #f13d3d;
}

.inpLock:checked + label svg {
  opacity: 1;
}

.inpLock:checked + label svg .bling {
  animation: bling6132 0.3s linear forwards;
  animation-delay: 0.2s;
}

.inpLock:checked + label svg .lock {
  stroke-dasharray: 48;
  animation: locked 0.3s linear forwards;
}

.inpLock:checked + label svg .lockb {
  transform: rotate(0);
  transform-origin: 14px 22px;
}

@keyframes bling6132 {
  50% {
    stroke-dasharray: 3;
    stroke-dashoffset: 12;
  }

  100% {
    stroke-dasharray: 3;
    stroke-dashoffset: 9;
  }
}

@keyframes locked {
  50% {
    transform: translateY(1px);
  }
}
</style>
