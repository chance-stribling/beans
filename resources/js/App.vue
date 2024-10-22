<script>
import TopBar from "./Components/TopBar.vue";
export default {
    components: {
        TopBar,
    },
};
</script>

<template>
    <v-app class="app">
        <TopBar />
        <v-main class="pa-0 ma-0">
            <v-container fluid class="pa-0 ma-0">
                <router-view v-slot="{ Component, route }">
                    <div :key="route.name">
                        <Component :is="Component" />
                    </div>
                </router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
<style scoped>
.app {
    background-color: black;
}
</style>
