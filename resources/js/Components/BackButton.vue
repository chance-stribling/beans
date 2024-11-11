<template>
    <div class="button-pos">
        <v-btn
            color="primary"
            height="60px"
            width="60px"
            class="rounded-circle"
            @click="this.$router.go(-1)"
        >
            <v-icon
                icon="mdi-arrow-left"
                size="large"
                class="p-0 m-0"
                color=""
            ></v-icon>
        </v-btn>
    </div>
</template>
<style scoped>
.button-pos {
    position: absolute;
    bottom: 15px;
    left: 15px;
    z-index: 3;
}
</style>
