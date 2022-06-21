import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import WriteView from "../views/WriteView.vue";
import ProfileView from "../views/ProfileView.vue";
import DetailsView from "../views/DetailsView.vue";
import SearchView from "../views/SearchView.vue";
import AdminView from "../views/AdminView.vue";
import ReadView from "../views/ReadView.vue";
import AdminConView from "../views/AdminConView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/Write",
      name: "Write",
      component: WriteView,
    },
    {
      path: "/Profile",
      name: "Profile",
      component: ProfileView,
    },
    {
      path: "/Details",
      name: "Details",
      component: DetailsView,
    },
    {
      path: "/Search",
      name: "Search",
      component: SearchView,
    },
    {
      path: "/Admin",
      name: "Admin",
      component: AdminView,
    },
    {
      path: "/Read",
      name: "Read",
      component: ReadView,
    },
    {
      path: "/ConnAdmin",
      name: "ConnAdmin",
      component: AdminConView,
    },
  ],
});

export default router;
