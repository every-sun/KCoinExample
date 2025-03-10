import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import path from "path";
import { defineConfig } from "vite";
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@images": path.resolve(__dirname, "public/images"),
            "@": path.resolve(__dirname, "resources/js"),
            "@utils": path.resolve(__dirname, "resources/js/utils"),
            "@store": path.resolve(__dirname, "resources/js/store"),
            "@components": path.resolve(__dirname, "resources/js/Components"),
            "@pages": path.resolve(__dirname, "resources/js/Pages"),
        },
    },
});
