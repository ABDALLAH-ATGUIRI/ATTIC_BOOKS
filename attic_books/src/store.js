import { createStore } from "vuex";
import axios from "axios";

export const store = createStore({
  state: {
    carts: [
      {
        title: "",
        body: "",
        index: 0,
        id_book: "",
      },
    ],
    slide: {
      index: 0,
      title: "",
      body: "",
      id_book: "",
    },
    title: "",
    category: "",
    author: "",
    Books: [],

    showImgPopup: false,
    showImgPopupbg: false,
    popupConn : false ,
    count: 1,

    bg_img: localStorage["bg_image"],
    user_img: localStorage["pro_image"],
  },

  getters: {
    popupShow() {
      if (localStorage["id_user"]) {
        return true;
      }

      return false;
    },

    // popupConn(x)
    // {
    //   x = !x
    // },
  },
  mutations: {
    addCart(state, item) {
      state.carts[item.index].body = item.body;
      state.carts[item.index].title = item.title;
      state.carts[item.index].index = item.index;
      state.carts[item.index].id_book = item.id_book;
    },
    incrementCount(state) {
      this.commit("addBook", this.state.carts[this.state.count - 1]);
      this.state.count = this.state.carts.length + 1;
      const item = {
        title: "",
        body: "",
        index: this.state.count - 1,
        id_book: "",
      };
      this.state.carts.push(item);
      this.commit("slides", item);
    },
    toggle(state) {
      state.showImgPopup = !state.showImgPopup;
    },
    bgPopup(state) {
      state.showImgPopupbg = !state.showImgPopupbg;
    },
    slides(state, item) {
      state.slide.body = item.body;
      state.slide.index = item.index;
      state.slide.title = item.title;
      state.slide.id_book = item.id_book;
    },
    delChapiter(state, item) {
      this.state.carts.splice(item, 1);
      console.log(this.state.carts);
      console.log(item);
    },
    addBook(state, item) {
      if (item) {
        let bodyFormData = new FormData();
        bodyFormData.append("id_book", JSON.stringify(item.id_book));
        bodyFormData.append("title", JSON.stringify(item.title));
        bodyFormData.append("body", JSON.stringify(item.body));
        bodyFormData.append("index", JSON.stringify(item.index));
        if (bodyFormData) {
          axios({
            method: "POST",
            url: "http://attic.local/Book/chapters",
            data: bodyFormData,
            headers: { "Content-Type": "multipart/form-data" },
          })
            .then((response) => {
              if (response.status == 200) {
                if (response.data) {
                }
              }
            })
            .catch((error) => {});
        }
      }
    },
  },
});
