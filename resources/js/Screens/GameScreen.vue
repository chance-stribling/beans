<script>
import axios from "axios";

export default {
    data: () => ({
        game: "",
        sets: [],
        matches: [],
        winners: [],
        nullCount: 0,
        lastMatchCreated: [],
        showAlert: false,
        alert: {
            title: "Can Not Start New Match",
            body: "You must finish the previous match to continue.",
        },
    }),
    mounted() {
        this.getGame();
        this.getSets();
    },
    methods: {
        getGame() {
            axios
                .get("/web/game/" + this.$route.params.id)
                .then((response) => {
                    this.game = response.data;
                })
                .catch((error) => console.log(error));
        },
        getSets() {
            axios
                .get("/web/sets/" + this.$route.params.id)
                .then((response) => {
                    this.sets = response.data;
                })
                .catch((error) => console.log(error));
        },
        // setSetWinner(set_id) {
        //     axios
        //         .get("/sets/winners/" + set_id)
        //         .then((response) => {
        //             console.log(response.data);
        //         })
        //         .catch((error) => console.log(error));
        // },
        async createMatch(set_id) {
            await axios
                .get("/web/match/last/" + set_id)
                .then((response) => {
                    this.lastMatchCreated = response.data;
                })
                .catch((error) => console.log(error));

            if (this.lastMatchCreated && this.lastMatchCreated.winner == null) {
                this.showAlert = true;
            } else {
                axios
                    .post("/web/match/" + set_id, {
                        set_id: set_id,
                        player1_id: this.game.player1_id,
                        player2_id: this.game.player2_id,
                        player3_id: this.player3 ? this.game.player3_id : null,
                        player4_id: this.player4 ? this.game.player4_id : null,
                        player5_id: this.player5 ? this.game.player5_id : null,
                        num_of_players: this.game.num_of_players,
                    })
                    .then((response) => {
                        this.getSets();
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
                        console.log(response.data);
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
    },
};
</script>

<template>
    <div class="winner" v-if="this.game.winner">
        <div>
            <v-card class="card1">
                <div class="text-h4">Winner:</div>
                <div class="text-h3">{{ this.game.winner_nickname }}</div>
            </v-card>
        </div>
    </div>
    <div class="main">
        <v-overlay
            class="overlay"
            v-model="this.showAlert"
            scroll-strategy="block"
        >
            <v-card class="overlay-card" color="error">
                <v-btn
                    size="small"
                    variant="plain"
                    icon="mdi-close"
                    class="close-button"
                    @click="this.showAlert = !this.showAlert"
                ></v-btn>
                <div class="text-h4">{{ this.alert.title }}</div>
                <div class="text-h6">{{ this.alert.body }}</div>
            </v-card>
        </v-overlay>
        <div class="versus-row">
            <div class="text-h4 text-white">
                {{ this.game.player1_nickname }} <br />
                Sets Won: {{ this.game.player1_sets_won }}
            </div>
            <div class="text-h4 text-white">&nbsp;VS.&nbsp;</div>
            <div class="text-h4 text-white">
                {{ this.game.player2_nickname }} <br />
                Sets Won: {{ this.game.player2_sets_won }}
            </div>
            <div class="text-h4 text-white" v-if="this.game.player3_nickname">
                &nbsp;VS.&nbsp;
            </div>
            <div class="text-h4 text-white" v-if="this.game.player3_nickname">
                {{ this.game.player3_nickname }}
            </div>
            <div class="text-h4 text-white" v-if="this.game.player4_nickname">
                &nbsp;VS.&nbsp;
            </div>
            <div class="text-h4 text-white" v-if="this.game.player4_nickname">
                {{ this.game.player4_nickname }}
            </div>
            <div class="text-h4 text-white" v-if="this.game.player5_nickname">
                &nbsp;VS.&nbsp;
            </div>
            <div class="text-h4 text-white" v-if="this.game.player5_nickname">
                {{ this.game.player5_nickname }}
            </div>
        </div>
        <div v-for="(set, index) in this.sets">
            <div v-if="index == 0 || this.sets[index - 1].winner">
                <div class="text-h4 text-white mb-5">Set {{ index + 1 }}</div>
                <div class="text-h4 text-white mb-5">
                    Winner: {{ set.winner }}
                </div>
                <div class="card-row">
                    <v-card
                        class="card"
                        v-for="(match, index) in this.sets[index].matches"
                        @click="
                            this.$router.push(
                                '/match/' + set.game_id + '/' + match.id,
                            )
                        "
                    >
                        <div>Match {{ index + 1 }}</div>
                        <div>
                            <div>
                                {{ this.game.player1_nickname }} :
                                {{ match.player1_pts }}
                            </div>
                            <div>
                                {{ this.game.player2_nickname }} :
                                {{ match.player2_pts }}
                            </div>
                            <div v-if="this.game.num_of_players >= 3">
                                {{ this.game.player3_nickname }} :
                                {{ match.player3_pts }}
                            </div>
                            <div v-if="this.game.num_of_players >= 4">
                                {{ this.game.player4_nickname }} :
                                {{ match.player4_pts }}
                            </div>
                            <div v-if="this.game.num_of_players == 5">
                                {{ this.game.player5_nickname }} :
                                {{ match.player5_pts }}
                            </div>
                        </div>
                        <div class="text-center">
                            Winner: <br /><span class="font-weight-bold">{{
                                match.winner_nickname
                                    ? match.winner_nickname
                                    : "TBD"
                            }}</span>
                        </div>
                    </v-card>
                    <v-card
                        v-if="!set.winner"
                        id="add-card"
                        @click="this.createMatch(set.id)"
                    >
                        <div class="text-h6">New Match</div>
                        <v-icon icon="mdi-plus" size="x-large"></v-icon>
                    </v-card>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.main {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 1rem;
}
.winner {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 1rem;
}
.card {
    min-height: 200px;
    width: 200px;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    margin-bottom: 1rem;
    margin-right: 1rem;
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
#add-card {
    min-height: 200px;
    width: 200px;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
    margin-right: 1rem;
}
#add-card:hover {
    scale: 1.1;
    cursor: pointer;
}
.card-row {
    display: flex;
    flex-wrap: wrap;
}
.card-col {
    width: 33%;
}
.versus-row {
    display: flex;
    justify-content: center;
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
