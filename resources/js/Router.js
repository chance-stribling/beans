import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Screens/LandingScreen.vue"),
    },
    {
        path: "/set/:id",
        component: () => import("./Screens/SetScreen.vue"),
    },
    {
        path: "/new-set",
        component: () => import("./Screens/NewSetScreen.vue"),
    },
    {
        path: "/settings",
        component: () => import("./Screens/SettingsScreen.vue"),
    },
    {
        path: "/history",
        component: () => import("./Screens/HistoryScreen.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
