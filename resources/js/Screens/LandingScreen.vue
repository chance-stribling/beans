<template>
    <div class="main">
        <v-card
            class="card text-h6 elevation-10"
            @click="this.$router.push('/history')"
        >
            Resume </v-card
        ><v-card
            class="card text-h6 elevation-10"
            @click="this.$router.push('/new-set')"
        >
            New Set
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
    flex-direction: row;
    align-items: center;
    justify-content: space-evenly;
    padding: 1rem;
}
.card {
    height: 150px;
    width: 150px;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
}
</style>
