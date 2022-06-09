import { createStore } from "vuex";

export const store = createStore({
  state: {
    carts: [
      {
        title: "",
        body: "",
      },
    ],

    showImgPopup: false,
    showImgPopupbg: false,
    count: 0,
    title: "",
    category: "",
    author: "",
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
      item.body != "" ? (state.carts[state.count - 1].body = item.body) : "";
      item.title != "" ? (state.carts[state.count - 1].title = item.title) : "";
    },
    incrementCount() {
      this.state.count = this.state.count + 1;
      const item = {
        title: "vide",
        body: "vide",
      };
      this.state.carts.push(item);
    },
    toggle(state) {
      state.showImgPopup = !state.showImgPopup;
    },
    bgPopup(state) {
      state.showImgPopupbg = !state.showImgPopupbg;
    },
    search(state, item) {
      title != "" ? (state.title = item.title) : "";
      category != "" ? (state.category = item.category) : "";
      author != "" ? (state.author = item.author) : "";
    },
  },
});
