<template>
    <div class="app">
        <v-app>
        <v-main>
        <Navbar></Navbar>
            <v-container fluid>
            <router-view></router-view>
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
