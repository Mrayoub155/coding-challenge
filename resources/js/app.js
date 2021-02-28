require("./bootstrap");

import Vue from "vue";
Vue.component("home", require("./components/home.vue").default);

new Vue({
    el: "#app",
    data() {
        return {
            data_test: "hello world!",
        };
    },
});
