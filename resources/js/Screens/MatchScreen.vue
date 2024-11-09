<script>
import axios from "axios";
import BackButton from "../Components/BackButton.vue";

export default {
    components: {
        BackButton,
    },
    data: () => ({
        match: [],
        set: [],
        game: [],
        players: [],
        zeroAlert: false,
        zeroAlertMessage: {
            title: "Player At Zero (0)",
            body: "Players can not go below zero.",
        },
        winnerAlert: false,
        winnerAlertMessage: {
            title: "Game Over",
            body: "We get it! You won!",
        },
    }),
    mounted() {
        this.getGame();
        this.getMatch();
    },
    methods: {
        getMatch() {
            axios
                .get("/web/match/" + this.$route.params.id)
                .then((response) => {
                    this.match = response.data;
                    this.getPlayers();
                    this.getSet(this.match.set_id);
                })
                .catch((error) => console.log(error));
        },
        updateSet(player) {
            if (player == "player1") {
                axios
                    .put("/web/set/" + this.set.id, {
                        player1_matches_won: this.set.player1_matches_won + 1,
                    })
                    .then((response) => {
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player2") {
                axios
                    .put("/web/set/" + this.set.id, {
                        player2_matches_won: this.set.player2_matches_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player3") {
                axios
                    .put("/web/set/" + this.set.id, {
                        player3_matches_won: this.set.player3_matches_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player4") {
                axios
                    .put("/web/set/" + this.set.id, {
                        player4_matches_won: this.set.player4_matches_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player5") {
                axios
                    .put("/web/set/" + this.set.id, {
                        player5_matches_won: this.set.player5_matches_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            }
        },
        updateGame(player) {
            if (player == "player1") {
                axios
                    .put("/web/game/" + this.game.id, {
                        player1_sets_won: this.game.player1_sets_won + 1,
                    })
                    .then((response) => {
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player2") {
                axios
                    .put("/web/game/" + this.game.id, {
                        player2_matches_won: this.game.player2_sets_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player3") {
                axios
                    .put("/web/game/" + this.game.id, {
                        player3_sets_won: this.game.player3_sets_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player4") {
                axios
                    .put("/web/game/" + this.game.id, {
                        player4_sets_won: this.game.player4_sets_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player5") {
                axios
                    .put("/web/game/" + this.game.id, {
                        player5_sets_won: this.game.player5_sets_won + 1,
                    })
                    .then((response) => {
                        console.log(response.data);
                        this.set = response.data;
                    })
                    .catch((error) => console.log(error));
            }
        },
        getSet(set_id) {
            axios
                .get("/web/set/" + set_id)
                .then((response) => {
                    this.set = response.data;
                })
                .catch((error) => console.log(error));
        },
        getGame() {
            axios
                .get("/web/game/" + this.$route.params.game_id)
                .then((response) => {
                    this.game = response.data;
                })
                .catch((error) => console.log(error));
        },

        getPlayers() {
            axios
                .get(
                    "/web/game/" +
                        this.$route.params.game_id +
                        "/" +
                        this.match.set_id +
                        "/" +
                        this.$route.params.id +
                        "/players",
                )
                .then((response) => {
                    this.players = response.data;
                })
                .catch((error) => console.log(error));
        },
        setWinner(player) {
            if (player == "player1") {
                //set match winner
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        winner: this.players[0].id,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));

                //if num of matches (set level) == matches won (game level) set set winner
                this.updateSet(player);
            } else if (player == "player2") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        winner: this.players[1].id,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
                this.updateSet(player);
            } else if (player == "player3") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        winner: this.players[2].id,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
                this.updateSet(player);
            } else if (player == "player4") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        winner: this.players[3].id,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
                this.updateSet();
            } else if (player == "player5") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        winner: this.players[4].id,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
                this.updateSet(player);
            }
        },
        addPoint(player, currentScore) {
            if (currentScore == 4) {
                this.addLogic(player, currentScore);
                this.setWinner(player);
            } else {
                this.addLogic(player, currentScore);
            }
        },
        losePoint(player, currentScore) {
            if (currentScore == 0) {
                this.zeroAlert = true;
            } else {
                this.loseLogic(player, currentScore);
            }
        },
        addLogic(player, currentScore) {
            if (player == "player1") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player1_pts: this.players[0].pts + 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player2") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player2_pts: ++this.players[1].pts,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player3") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player3_pts: ++this.players[2].pts,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player4") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player4_pts: ++this.players[3].pts,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player5") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player5_pts: ++this.players[4].pts,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            }
        },
        loseLogic(player, currentScore) {
            if (player == "player1") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player1_pts: currentScore - 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player2") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player2_pts: this.players[1].pts - 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player3") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player2_pts: this.players[2].pts - 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player4") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player2_pts: this.players[3].pts - 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            } else if (player == "player5") {
                axios
                    .put("/web/match/update", {
                        id: this.$route.params.id,
                        player2_pts: this.players[4].pts - 1,
                    })
                    .then((response) => {
                        this.getMatch();
                    })
                    .catch((error) => console.log(error));
            }
        },
    },
};
</script>
<template>
    <div class="main">
        <v-overlay
            class="overlay"
            v-model="this.zeroAlert"
            scroll-strategy="block"
        >
            <v-card class="overlay-card" color="error">
                <v-btn
                    size="small"
                    variant="plain"
                    icon="mdi-close"
                    class="close-button"
                    @click="this.zeroAlert = !this.zeroAlert"
                ></v-btn>
                <div class="text-h4">{{ this.zeroAlertMessage.title }}</div>
                <div class="text-h6">{{ this.zeroAlertMessage.body }}</div>
            </v-card>
        </v-overlay>

        <BackButton />
        <div v-if="this.match.winner_nickname">
            <v-card class="card1">
                <div class="text-h4">Winner:</div>
                <div class="text-h3">{{ this.match.winner_nickname }}</div>
            </v-card>
        </div>
        <div v-for="(player, index) in this.players" v-if="!this.match.winner">
            <v-card class="card1">
                <div class="text-h4">{{ player.nickname }}</div>
                <div class="text-h3">{{ player.pts }}</div>
                <div class="btns">
                    <v-btn
                        color="error"
                        class="btn text-h4"
                        @click="
                            this.losePoint('player' + (index + 1), player.pts)
                        "
                        >-</v-btn
                    >
                    <v-btn
                        color="success"
                        class="btn text-h4"
                        @click="
                            this.addPoint('player' + (index + 1), player.pts)
                        "
                        >+</v-btn
                    >
                </div>
            </v-card>
            <v-card class="card2">
                <div class="text-h4">Beans</div>
                <div class="text-h3">{{ player.golden_beans }}</div>
            </v-card>
        </div>
    </div>
</template>
<style scoped>
.main {
    height: 100vh;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
}
.card1 {
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: 2rem;
    margin-bottom: 10px;
}
.card2 {
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: 2rem;
}
.btns {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btn {
    height: 100%;
    width: 25%;
    margin-right: 10px;
}
.overlay {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.overlay-card {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    height: 250px;
    width: 500px;
    padding: 2rem;
}
.close-button {
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(-1rem, 1rem);
}
</style>
