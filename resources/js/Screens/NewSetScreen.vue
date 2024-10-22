<script>
  import axios from 'axios'

  export default {
    data: () => ({
      players: [],
      player1: '',
      player2: '',
    }),
    mounted() {
		  this.getPlayers();
	  },
    methods: {
      getPlayers(){
        axios.get('/players')
          .then( response => {
            this.players = response.data
          })
          .catch( error => (
            console.log(error)
          ));
      },
      clear(){
        this.player1 = '';
        this.player2 = '';
      },
      submit(){
        if(this.player1 == '' && this.player2 == ''){
          alert('Slow down. Who\'s playing?');
        }
        else if(this.player1 == this.player2){
          alert('You need two different players');
        }
        else if(this.player1==''){
          alert('Player 1 missing');
        }
        else if(this.player2==''){
          alert('Player 2 missing');
        }
        else{
          //create new game/set
          axios.post('/game', {
            player1_id : this.getIdByName(this.player1),
            player2_id : this.getIdByName(this.player2),
          })
          .then( response => {
            console.log(response.data.id)
            this.$router.push('/set/'+response.data.id)
          })
          .catch( error => (
            console.log(error)
          ));
        }
      },
      getIdByName(nickname){
        var player = this.players.find((player) => player.nickname === nickname)
        return player.id        
      }
    },
  }
</script>
<template>
    <div class="main">
      <div class="text-h3 title">New Set</div>
        <div class="input">
            <v-select
            :items="players"
            item-title="nickname"
            v-model="player1"
            label="Player 1"
            bg-color="white"
            ></v-select>

            <v-select
            :items="players"
            item-title="nickname"
            v-model="player2"
            label="Player 2"
            bg-color="white"
            ></v-select>

            <v-btn block color="error" class="mb-5" @click="this.clear()">Reset</v-btn>
            <v-btn block color="black" @click="this.submit()">Ready</v-btn>
        </div>
    </div>
</template>
<style scoped>
.main{
    height: 100vh;
    width: 100%;
    display: flex;
    color: white;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.title{
    margin-bottom: 1rem;
}
.input{
    width: 300px;
}
</style>