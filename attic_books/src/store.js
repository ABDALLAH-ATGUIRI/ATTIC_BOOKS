import { createStore } from "vuex";

export const store = createStore({
  state: {
    items: [],
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
