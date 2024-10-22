<script>
  export default {
    data: () => ({
      items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
    }),
  }
</script>
<template>
    <div class="main">
        <div class="text-h3 title">Settings</div>
        <div class="input">
            
            <v-btn block color="white" class="mb-5" @click="this.$router.push('/set')">Add Player</v-btn>

            <v-btn block color="white" @click="this.$router.push('/')">Done</v-btn>
            
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