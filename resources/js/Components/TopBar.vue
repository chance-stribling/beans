<template>
    <v-app-bar height="64" class="row" color="primary">
        <div class="app-bar">
            <div
                class="text-h4 font-weight-bold cursor-pointer title chalk"
                @click="this.$router.push('/')"
            >
                <img
                    src="/public/assets/images/beans.png"
                    alt=""
                    class="img mr-2"
                />
                Beans
            </div>
            <div class="text-h4 font-weight-bold col chalk">
                {{ this.$route.name }} {{ this.$route.params.id }}
            </div>
            
        </div>
    </v-app-bar>
</template>
<style scoped>
.app-bar{
    display: flex;
    width: 100%;
}
.row {
    padding: 8px;
}
.title {
    width: 33%;
    display: flex;
    flex-direction: row;
    justify-content: baseline;
    align-items: center;
    font-family: "Chalkboard";
}
.col {
    width: 33%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.navigator {
    width: 33%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: end;
}
.img {
    height: 60px;
    width: auto;
}
@media only screen and (max-width: 1000px) {
    .title {
    width: 50%;
}
.col {
    width: 50%;
}
}
</style>
