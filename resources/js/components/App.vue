<template>
    <div class="app">
        <v-app>
        <v-main>
            <v-app-bar app color="#1abc9c" dark clipped-left>
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Controllar</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon>
                    <v-icon>mdi-account</v-icon>
                </v-btn>

                <v-btn icon
                       @click="Sair">

                    Sair
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer app v-model="drawer" permanent expand-on-hover
            color="#2c3e50">
                <v-list nav >
                    <v-list-item v-for="item in items" :key="item.title" link >
                        <v-list-item-icon>
                            <v-icon color="white">{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content >
                            <v-list-item-title >
                                <div :style="{color: 'white'}" >
                                {{ item.title }}
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
            <v-container fluid class="grey lighten-5">
                <v-layout>
                    <v-flex>
                        <v-container fluid>
                        <router-view></router-view>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-main>
        </v-app>
    </div>
</template>

<script>
import './../../sass/app.scss'

export default {
    name: 'app',
    usuario:'',
    components: {
        Navbar: () => import('./templatePadrao.vue')
    },

    data: () => ({
        drawer: null,
        items: [
            { title: 'Home', icon: 'mdi-view-dashboard'},
            { title: 'Seleção'},
            { title: 'Propriedades' },
        ]
    }),

    //lista action vuetify

    methods:{
        Sair(){
            axios.post('sair',this.usuarioLogin).then(response => {
                this.usuarioLogado = response.data;
                this.$router.push('/')

            })
        },
    },


    /* <v-app dark id="inspire">

        <v-navigation-drawer
            app
            permanent expand-on-hover
           floating  color="white"
        >
            <sidebar-component dark app :user="this.userComp"></sidebar-component>
        </v-navigation-drawer> */



    /*<template>
    <div id="app">
    <v-app dark id="inspire">

        <v-navigation-drawer
            app
            permanent expand-on-hover
           floating  color="white"
        >
            <sidebar-component dark app :user="this.userComp"></sidebar-component>
        </v-navigation-drawer>
        <v-main>
          <navbar-component dark app :userid="this.user.id" :key="$route.fullPath"></navbar-component> <!--  Mudar para outra solução o reload do componente -->

<v-container fluid >
                <v-layout  >
                    <v-flex >
                        <router-view></router-view>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-main>
        <v-footer app fixed>
            <span>SysSolar&copy; 2021</span>
        </v-footer>
    </v-app>
</div>
</template>*/
}
</script>
