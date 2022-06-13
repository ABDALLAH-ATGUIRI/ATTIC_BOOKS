import { createStore } from "vuex";

export const store = createStore({
  state: {
    carts: [
      {
        title: "",
        body: "",
        index: 0,
      },
    ],
    slide: {
      index: 0,
      title: "",
      body: "",
    },
    title: "",
    category: "",
    author: "",
    Books: [],

    showImgPopup: false,
    showImgPopupbg: false,
    count: 1,
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
    },
    incrementCount() {
      this.state.count += 1;
      const item = {
        title: "",
        body: "",
        index: this.state.count -1,
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

    },
  },
});
