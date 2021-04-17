<template>
    <v-app>
        <!-- Must have the app property -->
        <v-app-bar app>
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>

            <v-breadcrumbs
                :class="
                    $vuetify.breakpoint.smAndDown ? 'pa-0 dense' : 'display-3'
                "
                class="text-uppercase pl-0"
                large
                :items="router"
            >
                <template v-slot:item="{ item }">
                    <v-breadcrumbs-item
                        class="pointer"
                        @click="$router.push(item.to)"
                        :disabled="item.disabled"
                        >{{
                            item.text ? item.text.toUpperCase() : ""
                        }}</v-breadcrumbs-item
                    >
                </template>
                <v-icon slot="divider">mdi mdi-menu-right</v-icon>
            </v-breadcrumbs>

            <v-spacer></v-spacer>
            <v-btn @click="logout" icon>
                <v-icon>mdi-logout</v-icon>
            </v-btn>
        </v-app-bar>

        <!-- NAVIGATION BAR -->
        <navigation :value="drawer"></navigation>

        <!-- CONTAINER -->
        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app :inset="true">
            <span class="px-2 caption ma-auto"
                >&copy; {{ new Date().getFullYear() }} - Company Corp.</span
            >
        </v-footer>
    </v-app>
</template>

<script>
import navigation from "./Navigation.vue";

export default {
    components: { navigation },

    data: () => ({
        drawer: false,
        matched: "",
        router: []
    }),

    created() {
        this.breadCrumbs();
    },

    methods: {
        logout() {
            window.location = "/logout";
        },

        breadCrumbs() {
            let vm = this;
            let path = this.$route.path;
            let split = path.split("/");
            let string = "";
            this.router = [];
            for (var i = 0; i < split.length; i++) {
                if (split[i]) {
                    string += "/" + split[i];
                    vm.matched = string;
                    if (vm.$router.match(vm.matched).name) {
                        vm.router.push({
                            text: vm.$router.match(vm.matched).name,
                            to: vm.$router.match(vm.matched).path,
                            disabled:
                                vm.$router.match(vm.matched).path ==
                                vm.$route.path
                        });
                    }
                }
            }
        }
    }
};
</script>
