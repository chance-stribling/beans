<template>
    <div class="button-pos">
        <v-btn
            color="white"
            height="60px"
            width="60px"
            class="rounded-circle"
            @click="this.$router.go(-1)"
        >
        <v-icon icon="mdi-arrow-left" size="large" class="p-0 m-0" color="accent"></v-icon>
    </v-btn>
    </div>
</template>
<style scoped>
.button-pos {
    position: absolute;
    bottom: 2rem;
    left: 2rem;
    z-index: 3;
}

</style>
