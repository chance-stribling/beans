<template>
    <div class="top-bar">
        <div class="text-h3 cursor-pointer" @click="this.$router.push('/')">
            Beans
        </div>
    </div>
</template>
<style scoped>
.top-bar {
    position: sticky;
    height: fit-content;
    width: 100%;
    padding: 1rem 2rem;
    background-color: black;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
