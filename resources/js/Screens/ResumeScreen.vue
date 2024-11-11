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
        completed: false,
        reveal: false,
        player1_name: "",
        isMobile: false,
        inProgressHidden: false,
        completedHidden: false,
    }),
    mounted() {
        this.getGamesWithWinners();
        this.getGamesWithoutWinners();
        this.mobileCheck();
    },

    created() {
        window.addEventListener("resize", this.mobileCheck);
    },
    destroyed() {
        window.removeEventListener("resize", this.mobileCheck);
    },
    methods: {
        mobileCheck() {
            if (window.innerWidth <= 1000) {
                this.isMobile = true;
            } else if (window.innerWidth > 1000) {
                this.isMobile = false;
            }
        },
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
        <v-card color="primary" class="big-card" v-if="!this.completed">
            <div class="mb-5 d-flex justify-space-between align-center">
                <div class="text-h4 chalk text-white">In Progress</div>
                <v-switch
                    class="chalk"
                    v-model="this.completed"
                    :label="this.completed ? 'In Progress' : 'Completed'"
                    hide-details
                    inset
                ></v-switch>
            </div>
            <div class="big-card-content">
                <v-card
                    v-for="game in inProgressGames"
                    color="secondary"
                    class="mini-card text-h6 elevation-10"
                    @click="this.$router.push('/game/' + game.id)"
                >
                    <div class="game-num chalk">Game: {{ game.id }}</div>
                    <div class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player1_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player1_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player2_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player2_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player3_id" class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player3_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player3_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player4_id" class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player4_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player4_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player5_id">
                        <div class="text-h5 chalk">
                            {{ game.player5_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player5_sets_won }} Baked Beans
                        </div>
                    </div>
                </v-card>
            </div>
        </v-card>
        <v-card color="primary" class="big-card" v-if="this.completed">
            <div class="mb-5 d-flex justify-space-between align-center">
                <div class="text-h4 chalk text-white">Completed</div>
                <v-switch
                    class="chalk"
                    v-model="this.completed"
                    :label="this.completed ? 'In Progress' : 'Completed'"
                    hide-details
                    inset
                ></v-switch>
            </div>
            <div class="big-card-content">
                <v-card
                    v-for="game in completedGames"
                    color="secondary"
                    class="mini-card text-h6 elevation-10"
                    @click="this.$router.push('/game/' + game.id)"
                >
                    <div class="game-num chalk">Game: {{ game.id }}</div>

                    <div class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player1_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player1_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player2_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player2_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player3_id" class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player3_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player3_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player4_id" class="mb-2">
                        <div class="text-h5 chalk">
                            {{ game.player4_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player4_sets_won }} Baked Beans
                        </div>
                    </div>
                    <div v-if="game.player5_id">
                        <div class="text-h5 chalk">
                            {{ game.player5_nickname }}
                        </div>
                        <div class="text-h6 text-center chalk">
                            {{ game.player5_sets_won }} Baked Beans
                        </div>
                    </div>
                </v-card>
            </div>
        </v-card>
    </v-sheet>
</template>
<style scoped>
.main {
    margin-top: 80px;
    width: 100vw;
    height: calc(100dvh - 80px);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}
.big-card {
    width: 99%;
    height: 100%;
    padding: 15px;
    overflow-y: scroll;
}
.big-card-content {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.mini-card {
    width: calc(25% - 15px);
    height: 400px;
    margin-bottom: 20px;
    margin-right: 15px;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.game-num {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
}
@media only screen and (max-width: 1000px) {
    .mini-card {
        width: 100%;
        height: fit-content;
        margin-bottom: 15px;
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
}
</style>
