<script>
import axios from "axios";

export default {
    data: () => ({
        players: [],
        player1: "",
        player2: "",
    }),
    mounted() {},
    methods: {},
};
</script>
<template>
    <div class="main">
        <div>
            <v-card class="card1">
                <div class="text-h3">Player 1</div>
                <div class="text-h2">0</div>
                <div class="btns">
                    <v-btn color="error" class="btn text-h2">-</v-btn>
                    <v-btn color="success" class="btn text-h2">+</v-btn>
                </div>
            </v-card>
            <v-card class="card2">
                <div class="text-h3">Beans</div>
                <div class="text-h2">0</div>
                <div class="btns2">
                    <v-btn color="error" class="btn text-h2">-</v-btn>
                    <v-btn color="success" class="btn text-h2">+</v-btn>
                </div>
            </v-card>
        </div>
        <div>
            <v-card class="card1">
                <div class="text-h3">Player 2</div>
                <div class="text-h2">0</div>
                <div class="btns">
                    <v-btn color="error" class="btn text-h2">-</v-btn>
                    <v-btn color="success" class="btn text-h2">+</v-btn>
                </div>
            </v-card>
            <v-card class="card2">
                <div class="text-h3">Beans</div>
                <div class="text-h2">0</div>
                <div class="btns2">
                    <v-btn color="error" class="btn text-h2">-</v-btn>
                    <v-btn color="success" class="btn text-h2">+</v-btn>
                </div>
            </v-card>
        </div>
    </div>
</template>
<style scoped>
.main {
    height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
}
.card1 {
    width: 48vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: 2rem;
    margin-bottom: 10px;
}
.card2 {
    width: 48vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: 2rem;
}
.btns {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.btns2 {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.btn {
    height: 100%;
    width: 48%;
}
</style>
