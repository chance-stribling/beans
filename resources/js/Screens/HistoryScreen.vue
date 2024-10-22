<script>
  import axios from 'axios'

  export default {
    data: () => ({
      games: [],
    }),
    mounted() {
		  this.getGames();
	  },
    methods: {
        getGames(){
            //get all games
            axios.get('/games')
            .then( response => {
            console.log(response.data)
            this.games = response.data
            })
            .catch( error => (
            console.log(error)
            ));
        },
    },
  }
</script>

<template>
    <div class="main">
        <v-card v-for="game in games" class="card text-h6 elevation-10">
            Resume
            <v-card-actions>
      <v-btn
        color="teal-accent-4"
        text="Learn More"
        variant="text"
        @click="reveal = true"
      ></v-btn>
    </v-card-actions>
        </v-card> 
        <v-expand-transition>
      <v-card
        v-if="reveal"
        class="position-absolute w-100"
        height="100%"
        style="bottom: 0;"
      >
        <v-card-text class="pb-0">
          <p class="text-h4">Origin</p>

          <p class="text-medium-emphasis">
            late 16th century (as a noun denoting a place where alms were distributed): from medieval Latin eleemosynarius, from late Latin eleemosyna ‘alms’, from Greek eleēmosunē ‘compassion’
          </p>
        </v-card-text>

        <v-card-actions class="pt-0">
          <v-btn
            color="teal-accent-4"
            text="Close"
            variant="text"
            @click="reveal = false"
          ></v-btn>
        </v-card-actions>
      </v-card>
    </v-expand-transition>  
    </div>
</template>
<style scoped>
.main{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.card{
    height: 150px;
    width: 90vw;
    background-color: white;
    color: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
}
</style>