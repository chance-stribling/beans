<template>
    <v-card color="primary" class="top-bar rounded-0">
        <div class="text-h3 cursor-pointer" @click="this.$router.push('/')">
            Beans
        </div>
    </v-card>
</template>
<style scoped>
.top-bar {
    position: absolute;
    height: fit-content;
    width: 100%;
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
