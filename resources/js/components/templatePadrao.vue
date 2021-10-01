<template>
    <v-card
        class="mx-auto overflow-hidden"
    >
        <v-app-bar
            color="#36663c"

        >
            <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
                <v-col
                    cols="12"
                    lg="10"

                >
            <v-toolbar-title
            >CONTROLE
            </v-toolbar-title>
                </v-col>
                <v-col
                    cols="12"
                    lg="2"

                >
            <v-btn
                dark
                color="#124057"
                class="mb-2"
                @click="Sair"
            >
                Sair
            </v-btn>
                </v-col>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            absolute
            temporary
        >
            <v-list
                nav
                dense
            >
                <v-list-item-group
                    v-model="group"
                    active-class="deep-purple--text text--accent-4"

                >
                    <v-list-item @click="Selecao">
                        <v-list-item-icon>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Home</v-list-item-title>
                    </v-list-item>


                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        drawer: false,
        group: null,
    }),

    methods:{

        Sair(){
            axios.post('sair',this.usuarioLogin).then(response => {
                this.usuarioLogado = response.data;
                this.$router.push('/')

            })
        },

        Selecao(){
            this.$router.push('selecao')
        }
    }
}
</script>
