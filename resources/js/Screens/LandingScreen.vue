<template>
    <div class="main">
        <v-card
            class="card text-h6 elevation-10"
            @click="this.$router.push('/resume')"
        >
            Resume </v-card
        ><v-card
            class="card text-h6 elevation-10"
            @click="this.$router.push('/new-game')"
        >
            New Game
        </v-card>
        <v-card
            class="card text-h6 elevation-10"
            @click="this.$router.push('/settings')"
        >
            Settings
        </v-card>
    </div>
</template>
<style scoped>
.main {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.card {
    height: 150px;
    width: 200px;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
}
</style>
