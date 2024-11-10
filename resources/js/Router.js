import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Screens/LandingScreen.vue"),
    },
    {
        path: "/game/:id",
        name: "Game",
        component: () => import("./Screens/GameScreen.vue"),
    },
    {
        path: "/match/:game_id/:id",
        name: "Match",
        component: () => import("./Screens/MatchScreen.vue"),
    },
    {
        path: "/new-game",
        name: "New Game",
        component: () => import("./Screens/NewGameScreen.vue"),
    },
    {
        path: "/settings",
        name: "Settings",
        component: () => import("./Screens/SettingsScreen.vue"),
    },
    {
        path: "/resume",
        name: "Resume",
        component: () => import("./Screens/ResumeScreen.vue"),
    },
    {
        path: "/new-player",
        name: "New Player",
        component: () => import("./Screens/NewPlayerScreen.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
