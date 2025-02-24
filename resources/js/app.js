import { createInertiaApp } from "@inertiajs/vue3";
import { createPinia } from "pinia";
import { createApp, h } from "vue";
import { ZiggyVue } from "ziggy-js";
import "../css/app.css";
import { Ziggy } from "./ziggy.js";

const pinia = createPinia();

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
