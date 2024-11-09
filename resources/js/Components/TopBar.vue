<template>
    <v-app-bar color="primary" class="top-bar rounded-0">
        <v-app-bar-title class="text-h4 font-weight-bold cursor-pointer" @click="this.$router.push('/')">
            Beans
        </v-app-bar-title>
    </v-app-bar>
</template>
<style scoped>
.top-bar {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
