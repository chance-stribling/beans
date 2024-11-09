<script>
import axios from "axios";

export default {
    data: () => ({
        name: "",
        nickname: "",
        dialog: false,
    }),
    methods: {
        clear() {
            this.name = "";
            this.nickname = "";
        },
        submit() {
            if (this.name == "" && this.nickname == "") {
                alert("Slow down. Who are you?");
            } else if (this.name == "") {
                alert("Name missing");
            } else if (this.nickname == "") {
                alert("Nickname missing");
            } else {
                axios
                    .post("/web/player", {
                        name: this.name,
                        nickname: this.nickname,
                    })
                    .then((response) => {
                        this.clear();
                        console.log(response.data);
                    })
                    .catch((error) => console.log(error));
                this.dialog = true;
            }
        },
    },
};
</script>
<template>
    <div class="main">
        <div class="text-h3 title">Add Player</div>
        <div class="input">
            <v-text-field
                v-model="name"
                label="Name"
                bg-color="white"
                clearable
            ></v-text-field>

            <v-text-field
                v-model="nickname"
                label="Nickname"
                bg-color="white"
                clearable
            ></v-text-field>

            <v-btn block color="success" class="mb-5" @click="this.submit()"
                >Done</v-btn
            >
            <v-btn block color="error" @click="this.$router.push('/settings')"
                >Cancel</v-btn
            >

            <v-dialog v-model="dialog" width="auto">
                <v-card
                    max-width="400"
                    text="Would you like to add another player?"
                    title="Player Created Successfully"
                >
                    <template v-slot:actions>
                        <v-btn
                            color="success"
                            text="Yes"
                            @click="dialog = false"
                        ></v-btn>
                        <v-btn
                            color="error"
                            text="No"
                            @click="this.$router.push('/settings')"
                        ></v-btn>
                    </template>
                </v-card>
            </v-dialog>
        </div>
    </div>
</template>
<style scoped>
.main {
    height: 100vh;
    width: 100%;
    display: flex;
    color: white;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.title {
    margin-bottom: 1rem;
}
.input {
    width: 300px;
}
</style>
