import Vue from "vue";
import "./bootstrap";
import router from "./router";

const app = new Vue({
    data() {
        return {
            title: "Hello",
        };
    },
    router,
    components: {},
});
app.$mount("#app");
