import "./bootstrap";
import { createApp } from "vue";
import router from "./Router";
import App from "./App.vue";
// Vuetify
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";

const customTheme = {
    dark: false,
    colors: {
        primary: "#292D2E",
        secondary: "#505357",
        accent: "#D1CFC7",
        error: "#FF5252",
        info: "#2196F3",
        success: "#4CAF50",
        warning: "#FFC107",
    },
};

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: "customTheme",
        themes: {
            customTheme,
        },
    },
});

createApp(App).use(router).use(vuetify).mount("#app");
