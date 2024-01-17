import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/assets/app.scss", "resources/assets/js/app.js"],
            // detectTls: "lumeldecor.test",
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/assets/js",
        },
    },
});
