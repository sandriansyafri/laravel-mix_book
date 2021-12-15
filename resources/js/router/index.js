Vue.use(VueRouter);
import Vue from "vue";
import VueRouter from "vue-router";

const Home = { template: "<div>Home</div>" };

const routes = [{ path: "/", component: Home }];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
