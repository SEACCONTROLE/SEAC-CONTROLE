<template>
    <div class="home">
    <v-app id="inspire">
        <v-main>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="8">
                        <v-card class="elevation-12">
                            <v-window v-model="step">
                                <v-window-item :value="1">
                                    <v-row>
                                        <v-col cols="12" md="12">
                                            <v-card-text class="mt-12">
                                                <h1

                                                    class="text-center display-2"
                                                >Login CONTROLE</h1>

                                                <h4 class="text-center mt-4">Insira seu email registrado</h4>
                                                <v-form v-model="valid">
                                                    <v-text-field
                                                        v-model="usuarioLogin.emaillogin"
                                                        label="EMAIL"
                                                        name="emaillogin"
                                                        type="text"
                                                        color="teal accent-3"

                                                    />

                                                    <v-text-field
                                                        v-model="usuarioLogin.senhalogin"
                                                        id="senha"
                                                        label="Senha"
                                                        name="senhalogin"
                                                        type="password"
                                                        color="teal accent-3"
                                                    />
                                                </v-form>
                                                <div class="text-center mt-3">
                                                    <v-btn rounded color="#124057" @click="logar" dark>Entrar</v-btn>
                                                </div>
                                            </v-card-text>

                                        </v-col>

                                    </v-row>
                                </v-window-item>

                            </v-window>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
    </div>
</template>

<script>
export default {
    name: 'home',
    data: () => ({

        valid: false,
        nome: '',
        emaillogin: '',
        senhalogin: '',
        EMAIL: '',
        usuarioLogado: '',
        senha: '',
        usuario: {
            nome: '',
            EMAIL: '',
            senha: ''},

        usuarioLogin: {
            emaillogin: '',
            senhalogin: ''},
        step: 1
    }),
    props: {
        source: String
    },

    created () {
        this.initialize()

    },

    methods: {
        initialize() {

            axios.post('homeSession/').then(response => {
                this.usuarioLogado = response.data;
                if(this.usuarioLogado){
                    this.$router.push('selecao')
                }

            })

        },

        logar() {

            axios.post('user',this.usuarioLogin).then(response => {
                this.usuarioLogado = response.data;

                if (this.usuarioLogado == 'True') {
                    this.$router.push('selecao')
                } else if(this.usuarioLogado == 'INVALID_PASSWORD'){
                    alert('INVALID_PASSWORD')
                }else if(this.usuarioLogado == 'EMAIL_NOT_FOUND'){
                    alert('EMAIL_NOT_FOUND')
                }else if(this.usuarioLogado == 'ERRO'){
                    alert('LOGIN INVALIDO')
                }
            })

                .then(response=>{

                })
                .finally(()=>{

                })
        },
        registrar() {
            axios.post('/cadastrar',this.usuario)
            location.reload()
                .then(response=>{

                })
                .finally(()=>{

                })
        }
    },

};


</script>
