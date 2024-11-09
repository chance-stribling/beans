import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Screens/LandingScreen.vue"),
    },
    {
        path: "/game/:id",
        component: () => import("./Screens/GameScreen.vue"),
    },
    {
        path: "/match/:game_id/:id",
        name: "match",
        component: () => import("./Screens/MatchScreen.vue"),
    },
    {
        path: "/new-game",
        component: () => import("./Screens/NewGameScreen.vue"),
    },
    {
        path: "/settings",
        component: () => import("./Screens/SettingsScreen.vue"),
    },
    {
        path: "/resume",
        component: () => import("./Screens/ResumeScreen.vue"),
    },
    {
        path: "/new-player",
        component: () => import("./Screens/NewPlayerScreen.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
