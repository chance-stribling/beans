<script>
import axios from "axios";
import BackButton from "../Components/BackButton.vue";

export default {
    components: {
        BackButton,
    },
    data: () => ({
        players: [],
        player1: "",
        player2: "",
        player3: "",
        player4: "",
        player5: "",
        num_of_players: 2,
        num_of_sets: 5,
        num_of_matches: 5,
    }),
    mounted() {
        this.getPlayers();
    },
    methods: {
        getPlayers() {
            axios
                .get("web/players")
                .then((response) => {
                    this.players = response.data;
                })
                .catch((error) => console.log(error));
        },
        clear() {
            this.player1 = "";
            this.player2 = "";
            this.player3 = "";
            this.player4 = "";
            this.player5 = "";
        },
        createGame() {
            //create new game/set
            axios
                .post("web/game", {
                    player1_id: this.getIdFromName(this.player1),
                    player2_id: this.getIdFromName(this.player2),
                    player3_id: this.player3
                        ? this.getIdFromName(this.player3)
                        : null,
                    player4_id: this.player4
                        ? this.getIdFromName(this.player4)
                        : null,
                    player5_id: this.player5
                        ? this.getIdFromName(this.player5)
                        : null,
                    num_of_matches: this.num_of_matches,
                    num_of_sets: this.num_of_sets,
                    num_of_players: this.num_of_players,
                })
                .then((response) => {
                    this.$router.push("/game/" + response.data.id);
                })
                .catch((error) => console.log(error));
        },
        getIdFromName(nickname) {
            var player = this.players.find(
                (player) => player.nickname === nickname,
            );
            return player.id;
        },
    },
};
</script>
<template>
    <BackButton />
    <v-sheet color="secondary" class="main">
        <v-card class="card" color="accent">
            <div class="text-h4 font-weight-bold title">New Game</div>
            <div class="input">
                <div class="text-h6">Number of Players</div>
                <v-slider
                    color="secondary"
                    v-model="num_of_players"
                    :max="5"
                    :min="2"
                    :step="1"
                >
                    <template v-slot:append>
                        <v-text-field
                            v-model="num_of_players"
                            density="compact"
                            style="width: 80px"
                            type="number"
                            :max="5"
                            :min="2"
                            variant="outlined"
                            hide-details
                        ></v-text-field>
                    </template>
                </v-slider>

                <div class="text-h6">Sets to Win Game</div>
                <v-slider
                    color="secondary"
                    v-model="num_of_sets"
                    :max="5"
                    :min="1"
                    :step="1"
                >
                    <template v-slot:append>
                        <v-text-field
                            v-model="num_of_sets"
                            density="compact"
                            style="width: 80px"
                            type="number"
                            :max="5"
                            :min="1"
                            variant="outlined"
                            hide-details
                        ></v-text-field>
                    </template>
                </v-slider>

                <div class="text-h6">Matches to Win Set</div>
                <v-slider
                    color="secondary"
                    v-model="num_of_matches"
                    :max="5"
                    :min="1"
                    :step="1"
                >
                    <template v-slot:append>
                        <v-text-field
                            v-model="num_of_matches"
                            density="compact"
                            style="width: 80px"
                            type="number"
                            :max="5"
                            :min="1"
                            variant="outlined"
                            hide-details
                        ></v-text-field>
                    </template>
                </v-slider>
                <v-select
                    :items="players"
                    item-title="nickname"
                    bg-color="white"
                    label="Player 1"
                    v-model="player1"
                ></v-select>
                <v-select
                    v-if="num_of_players >= 2"
                    :items="players"
                    item-title="nickname"
                    bg-color="white"
                    label="Player 2"
                    v-model="player2"
                ></v-select>
                <v-select
                    v-if="num_of_players >= 3"
                    :items="players"
                    item-title="nickname"
                    bg-color="white"
                    label="Player 3"
                    v-model="player3"
                ></v-select>
                <v-select
                    v-if="num_of_players >= 4"
                    :items="players"
                    item-title="nickname"
                    bg-color="white"
                    label="Player 4"
                    v-model="player4"
                ></v-select>
                <v-select
                    v-if="num_of_players == 5"
                    :items="players"
                    item-title="nickname"
                    bg-color="white"
                    label="Player 5"
                    v-model="player5"
                ></v-select>
                <div class="d-flex justify-space-evenly w-100">
                    <v-btn color="success" @click="this.createGame()">
                        Ready
                    </v-btn>
                    <v-btn color="error" @click="this.clear()">Reset</v-btn>
                </div>
            </div>
        </v-card>
    </v-sheet>
</template>
<style scoped>
.main {margin-top: 64px;
    min-height: 100vh;
    padding: 2rem;
    width: 100%;
    display: flex;
    color: white;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.title {
    margin-bottom: 1rem;
}
.input {
    width: 300px;
}
.card {
    color: white !important;
    width: 90vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 2rem;
}
</style>
