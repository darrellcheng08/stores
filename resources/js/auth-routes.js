import VueRouter from "vue-router";

// LOGIN
import LoginPage from "@auth/login";

const router = new VueRouter({
  mode: "history",
  routes: [
    // LOGIN COMPONENT ROUTES
    {
        name: "Login",
        path: "/login",
        component: LoginPage,
    }
  ],
});

export { router, VueRouter };
