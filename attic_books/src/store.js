import { createStore } from "vuex";

export const store = createStore({
  state: {
    items: [],
  },
  data() {
    return {
    };
  },
  getters: {
    popupShow() {
      if (localStorage["user-info"]) {
        return true;
      }
     
      return false; 
    },
    popupConn(x)
    {
      x = !x
    }
  },
  mutations: {
    addCart(state, item) {
      const exist = state.items.filter((ele) => ele.count === item.count);
      if (exist.length) {
        state.items = state.items.filter((ele) => ele.count !== item.count);

        state.items.push(item);
      } else {
        state.items.push(item);
      }
    },
  },
});
