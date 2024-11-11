<script>
export default {
    data: () => ({
        isMobile: false,
        completed: true,
    }),
    mounted() {
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
    },
};
</script>
<template>
    <div class="button-pos">
        <v-switch
            v-model="this.completed"
            label="Completed Games"
            hide-details
            inset
        ></v-switch>
    </div>
</template>

<style scoped>
.button-pos {
    position: absolute;
    bottom: 2rem;
    right: 2rem;
    z-index: 3;
}
</style>
