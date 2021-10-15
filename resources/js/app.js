/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vuetify from 'vuetify';
import Vue from 'vue';
import Vuex from 'vuex'
import 'vuetify/dist/vuetify.min.css';
import VueRouter from 'vue-router';
import VueMask from 'v-mask'

require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueMask);
Vue.use(Vuex)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('app-test', require('./components/appTest.vue').default);
Vue.component('home', require('./components/home.vue').default);
Vue.component('template-padrao', require('./components/templatePadrao.vue').default);
Vue.component('selecao', require('./components/selecaoSimulador.vue').default);
Vue.component('lista-propriedade', require('./components/listaPropriedade.vue').default);
Vue.component('lista-culturas', require('./components/culturas.vue').default);
Vue.component('cadastrar-cotacoes', require('./components/cotacoes.vue').default);
Vue.component('cadastrar-pensamento', require('./components/pensamentoEstrategico.vue').default);
Vue.component('template-usuario', require('./components/templateUsuario.vue').default);
Vue.component('template-simulador', require('./components/TemplateSimuladorAgricultura.vue').default);
Vue.component('token-use', require('./components/tokenComponent.vue').default);
Vue.component('ciclo', require('./components/ciclo.vue').default);

Vue.component('terraNua', require('./components/mercadoTerraNua.vue').default);
Vue.component('culturasMercado', require('./components/culturasMercado.vue').default);
Vue.component('culturasPensamento', require('./components/culturasPensamento.vue').default);







import Selecao from './components/selecaoSimulador.vue'
import Cultura from './components/culturas.vue'

import Ciclo from './components/ciclo.vue'

import Template from './components/templatePadrao.vue'
import App from './components/App.vue'

import Propriedades from './components/listaPropriedade.vue'
import Cotacoes from './components/cotacoes.vue'
import Pensamento from './components/pensamentoEstrategico.vue'
import MenuUsuario from './components/templateUsuario.vue'
import MenuSimulador from './components/TemplateSimuladorAgricultura.vue'
import Home from './components/home.vue'
import Terra from './components/mercadoTerraNua.vue'
import CulturasMercado from './components/culturasMercado.vue'
import CulturasPensamento from './components/culturasPensamento.vue'


const store = new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        increment (state) {
            state.count++
        }
    }
})


const router = new VueRouter({
    mode: 'history',
    routes: [


        {
            path: '/selecao',
            components: {
                default: Selecao
            },

        },



        {
            path: '/culturas',
            component: Cultura

        },

        {
            path: '/culturasMercado',
            component: CulturasMercado

        },

        {
            path: '/culturasPensamento',
            component: CulturasPensamento

        },

        {
            path: '/terraNua',
            component: Terra

        },

        {
            path: '/ciclo',
            component: Ciclo

        },

        {
            path: '/propriedades',
            component: Propriedades

        },

        {
            path: '/cotacoes',
            component: Cotacoes

        },

        {
            path: '/pensamento',
            component: Pensamento

        },



        {
            path: '/template',
            name: 'template',
            component: Template
        },
        {
            path: '',
            component: Home,
            name: 'home',
        },
    ],
});


export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: "#14C6FF",
                secondary: "#424242",
                accent: "#82B1FF",
                error: "#FF5252",
                info: "#2196F3",
                success: "#4CAF50",
                warning: "#FFC107",
                lightblue: "#14c6FF",
                yellow: "#FFCF00",
                pink: "#FF1976",
                orange: "#FF8657",
                magenta: "#C33AFC",
                darkblue: "#1E2D56",
                gray: "#909090",
                neutralgray: "#9BA6C1",
                green: "#2ED47A",
                red: "#FF5c4E",
                darkblueshade: "#308DC2",
                lightgray: "#BDBDBD",
                lightpink: "#FFCFE3",
                white: "#FFFFFF"
            }
        }
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
    components: {App}
});

