<script>
import TopBar from "./Components/TopBar.vue";
import BackButton from "./Components/BackButton.vue";
export default {
    components: {
        TopBar,
        BackButton,
    },
};
</script>

<template>
    <v-app>
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
<style>
.chalk {
    font-family: "Fredericka the Great", sans-serif !important;
    font-weight: 600 !important;
    font-style: normal !important;
}
</style>
