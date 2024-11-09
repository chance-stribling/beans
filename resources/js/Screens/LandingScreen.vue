<template>
    <v-sheet color="secondary" class="main">
        <v-card
            color="accent"
            class="card text-h4 elevation-10"
            @click="this.$router.push('/resume')"
        >
            Resume </v-card
        ><v-card
            color="accent"
            class="card text-h4 elevation-10"
            @click="this.$router.push('/new-game')"
        >
            New Game
        </v-card>
        <v-card
            color="accent"
            class="card text-h4 elevation-10"
            @click="this.$router.push('/settings')"
        >
            Settings
        </v-card>
    </v-sheet>
</template>
<style scoped>
.main {
    width: 100%;
    height: 100dvh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.card {
    width: 90vw;
    color: white !important;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
    padding: 2rem;
}
</style>
