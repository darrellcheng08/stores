<template>
    <v-menu
        lazy
        @mouseleave="show = false"
        nudge-width="15"
        class="menuable"
        absolute
        :position-x="style.left"
        :position-y="style.top"
        v-model="show"
        v-show="show"
        offset-y
    >
        <v-card>
            <slot></slot>
        </v-card>
    </v-menu>
</template>

<script>
export default {
    data: () => ({
        style: {
            position: "fixed",
            zIndex: 9,
            left: 0,
            top: 0
        },
        show: false
    }),
    watch: {
        $route(val) {
            this.show = false;
        }
    },
    mounted() {
        let vm = this,
            target = vm.$el.parentElement;

        target.onclick = e => {
            if (e.target == vm.$el || e.target.tagName == "LI") return;
            e.preventDefault();

            vm.style.left = e.x;
            vm.style.top = e.y + 10;
            vm.show = true;
        };
    }
};
</script>

<style scoped>
.v-list {
    width: 150px;
}
</style>
