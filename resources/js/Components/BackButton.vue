<template>
    <div class="button">
        <v-btn
            icon="mdi-arrow-left"
            color="white"
            @click="this.$router.go(-1)"
        ></v-btn>
    </div>
</template>
<style scoped>
.button {
    height: 100px;
    width: 100px;
    position: absolute;
    top: 15%;
    left: 2rem;
}
</style>
