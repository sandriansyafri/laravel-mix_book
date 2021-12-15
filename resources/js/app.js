require("./bootstrap");
Vue.use(VueRouter);
import Vue from "vue";
import VueRouter from "vue-router";
import Example from "./components/ExampleComponent.vue";

const routes = [{ path: "/", component: Home }];

const router = new VueRouter({
    mode: "history",
    routes,
});

const app = new Vue({
    data() {
        return {
            title: "Hello",
        };
    },
    router,
    components: {
        Example,
    },
});
app.$mount("#app");
