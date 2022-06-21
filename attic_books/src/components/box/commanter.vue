<template>
  <div class="w-80 sm:w-1/2 lg:w-1/3 fixed top-20 z-0 right-0">
    <h1
      class="w-full text-center text-white text-xl font-bold bg-orange-400 py-4"
    >
      Commanter
    </h1>
    <div class="min-w-[370px] bg-white h-screen">
      <div class="px-6">
        <div class="flex items-center gap-5 pt-4">
          <div class="w-14 h-12">
            <img
              class="rounded-full w-full h-full"
              :src="`/src/assets/uploads/` + pro_img"
              alt=""
            />
          </div>
          <div
            class="relative col-span-2 w-full grid-col-1 flex w-full justify-center md:justify-start text-black"
          >
            <textarea
              name="comanter"
              id=""
              cols="30"
              rows="10"
              v-model="commenter"
              placeholder="Trouvez votre commenter"
              class="w-full h-16 bg-gray-100 transition border border-transparent focus:outline-none focus:border-sky-500 rounded py-3 px-2 pl-10 appearance-none leading-normal"
            ></textarea>
            <div
              class="absolute left-0"
              style="top: 1rem; left: 0.8rem"
              @click="AddComment"
            >
              <img
                class="w-5 h-5"
                src="../../assets/icons/send (1).png"
                alt=""
              />
            </div>
          </div>
        </div>

        <div class="overflow-y-scroll px-2 h-screen">
          <div
            v-for="commenter in comments"
            :key="commenter.id"
            
          >
          <comment :pro_image="commenter.pro_image" :name="commenter.f_name+'-'+commenter.l_name" :id_user="commenter.id_utilisateur" :commenter="commenter.commneter" :Id_commenter="commenter.Id_commenter"></comment>
          </div>
          <div class="w-full h-64"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { Popover } from "@headlessui/vue";
import axios from "axios";
import comment from "./comment.vue";
// import { threadId } from "worker_threads";

export default {
  props: ["chapiter", "reader"],
  name: "Commenter",
  components: {
    Popover,
  },
  data() {
    return {
      hidde: true,
      btn: false,
      pro_img: this.$store.state.user_img,
      author: "",
      commenter: "",
      comments: "",
    };
  },
  components: {
    comment,
  },
  mounted() {
    this.getComments();
  },
  methods: {
    Author() {
      let formdata = new FormData();
      formdata.append("id_user", this.id_user);
      axios({
        method: "post",
        url: "http://attic.local/Authors/Author",
        data: formdata,
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.pro_img = response.data["pro_image"];
              this.f_name = response.data["f_name"];
              this.l_name = response.data["l_name"];
            } else {
              router.push({ path: "/" });
            }
          }
        })
        .catch((error) => {
          window.history.back();
        });
    },
    AddComment() {
      let formdata = new FormData();
      formdata.append("Id_user", this.reader);
      formdata.append("Id_chapiter", this.chapiter);
      formdata.append("commenter", this.commenter);
      axios({
        method: "post",
        url: "http://attic.local/Post/AddComm",
        data: formdata,
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.commenter = "";
              this.getComments();
            }
          }
        })
        .catch((error) => {
          window.history.ba;
        });
    },
    getComments() {
      let formdata = new FormData();
      formdata.append("Id_chapiter", this.chapiter);
      axios({
        method: "post",
        url: "http://attic.local/Post/getComm",
        data: formdata,
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            if (response.data) {
              this.comments = response.data.reverse();
            }
          }
        })
        .catch((error) => {
          window.history.ba;
        });
    },
  },
};
</script>
