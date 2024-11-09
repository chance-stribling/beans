<script>
import axios from "axios";
import BackButton from "../Components/BackButton.vue";

export default {
    components: {
        BackButton,
    },
    data: () => ({
        games: [],
        reveal: false,
        player1_name: "",
    }),
    mounted() {
        this.getGames();
    },
    methods: {
        getGames() {
            //get all games
            axios
                .get("web/games")
                .then((response) => {
                    this.games = response.data;
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>

<template>
    <div class="main">
        <BackButton />

        <div class="text-h3 text-white mb-5">In Progress</div>
        <v-card
            v-for="game in games"
            class="card text-h6 elevation-10"
            @click="this.$router.push('/game/' + game.id)"
        >
            <div class="card-col text-center">
                <div class="text-h4 mb-2">
                    {{ game.player1_nickname }}
                </div>
                <div class="text-h6">{{ game.player1_pts }} Points</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player2_nickname }}</div>
                <div class="text-h6">{{ game.player2_pts }} Points</div>
            </div>
        </v-card>
    </div>
</template>
<style scoped>
.main {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.card {
    min-height: 100px;
    width: 90vw;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    margin-bottom: 1rem;
}
.card-col {
    width: 33%;
}
</style>
