<script>
import axios from "axios";
import BackButton from "../Components/BackButton.vue";

export default {
    components: {
        BackButton,
    },
    data: () => ({
        inProgressGames: [],
        completedGames: [],
        reveal: false,
        player1_name: "",
    }),
    mounted() {
        this.getGamesWithWinners();
        this.getGamesWithoutWinners();
    },
    methods: {
        getGamesWithWinners() {
            //get completed games
            axios
                .get("web/games/withWinners")
                .then((response) => {
                    this.completedGames = response.data;
                })
                .catch((error) => console.log(error));
        },
        getGamesWithoutWinners() {
            //get in progress games
            axios
                .get("web/games/withoutWinners")
                .then((response) => {
                    this.inProgressGames = response.data;
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>

<template>
    <v-sheet color="secondary" class="main">
        <BackButton />

        <div class="text-h3 text-white mb-5">In Progress</div>
        <v-card
            v-for="game in inProgressGames"
            color="accent"
            class="card text-h6 elevation-10"
            @click="this.$router.push('/game/' + game.id)"
        >
            <div class="card-col text-center">
                <div class="text-h4 mb-2">
                    {{ game.player1_nickname }}
                </div>
                <div class="text-h6">{{ game.player1_sets_won }} Points</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player2_nickname }}</div>
                <div class="text-h6">{{ game.player2_sets_won }} Points</div>
            </div>
            <div v-if="game.player3_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player3_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player3_nickname }}</div>
                <div class="text-h6">{{ game.player3_sets_won }} Points</div>
            </div>
            <div v-if="game.player4_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player4_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player4_nickname }}</div>
                <div class="text-h6">{{ game.player4_sets_won }} Points</div>
            </div>
            <div v-if="game.player5_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player5_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player5_nickname }}</div>
                <div class="text-h6">{{ game.player5_sets_won }} Points</div>
            </div>
        </v-card>
        <div class="text-h3 text-white mb-5">Completed</div>
        <v-card
            v-for="game in completedGames"
            color="accent"
            class="card text-h6 elevation-10"
            @click="this.$router.push('/game/' + game.id)"
        >
            <div class="card-col text-center">
                <div class="text-h4 mb-2">
                    {{ game.player1_nickname }}
                </div>
                <div class="text-h6">{{ game.player1_sets_won }} Points</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player2_nickname }}</div>
                <div class="text-h6">{{ game.player2_sets_won }} Points</div>
            </div>
            <div v-if="game.player3_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player3_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player3_nickname }}</div>
                <div class="text-h6">{{ game.player3_sets_won }} Points</div>
            </div>
            <div v-if="game.player4_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player4_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player4_nickname }}</div>
                <div class="text-h6">{{ game.player4_sets_won }} Points</div>
            </div>
            <div v-if="game.player5_id" class="card-col text-center">
                <div class="text-h6">VS.</div>
            </div>
            <div v-if="game.player5_id" class="card-col text-center">
                <div class="text-h4 mb-2">{{ game.player5_nickname }}</div>
                <div class="text-h6">{{ game.player5_sets_won }} Points</div>
            </div>
        </v-card>
    </v-sheet>
</template>
<style scoped>
.main {
    margin-top: 64px;
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
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    margin-bottom: 1rem;
}

</style>
