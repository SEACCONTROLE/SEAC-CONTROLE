<template>
    <v-app id="inspire">

    <v-form>
        <v-container>
            <v-row>
                <v-col
                    cols="12"
                    md="6"
                    class="text-center"
                >
                    <v-btn rounded color="#124057" @click="agricultura" dark>Simulador Agricultura</v-btn>

                </v-col>

                <v-col
                    cols="12"
                    md="6"
                    class="text-center"
                >
                    <v-btn rounded color="#124057" dark>Simulador Pecuaria</v-btn>

                </v-col>



            </v-row>
        </v-container>
    </v-form>
    </v-app>
</template>

<script>
import Navbar from "./Navbar";
export default {

    name: 'app',

    components: {Navbar,

    },
    data: () => ({
        valid: false
    }),
    props: {
        source: String
    },

    methods: {

        Sair(){
            axios.post('sair',this.usuarioLogin).then(response => {
                this.usuarioLogado = response.data;
                this.$router.push('/')

            })
        },

        agricultura() {
            axios.post('propriedade')
            this.$router.push('culturas')
                .then(response=>{

                })
                .finally(()=>{

                })
        },
    },

};


</script>
