<template>
    <v-app>
        <NavbarSimulador></NavbarSimulador>
        <main>
            <v-form v-model="valid">
                <token-use></token-use>
                <v-container fluid>
                <v-row>
                    <v-col
                    cols="12"
                    lg="12"
                    >
                        <h1
                            class="text-center"
                        >Simulador de Mercado</h1>
                    </v-col>
                </v-row>

                </v-container>

                <v-container fluid>
                <v-row justify="center">
                    <v-col
                        cols="12"
                        lg="4"
                    >
                        <v-text-field
                            v-model="cotacao.ValorHectareVenda"
                            solo
                            v-on:keyup="sacasVenda(cotacao)"
                        label="Valor Do Hectare para Venda em R$"
                        >

                        </v-text-field>
                    </v-col>


                    <v-col
                        cols="12"
                        lg="4"
                    >
                        <v-text-field
                            v-model="cotacao.QuantidadeSacasVenda"
                            solo
                            label="Valor em Sacas"
                        >

                        </v-text-field>
                    </v-col>
                    </v-row>

                    <v-row>
                        <v-col
                            cols="12"
                            lg="4"
                        >
                            <v-text-field
                                v-model="cotacao.porcentagemValorArrendamento"
                                solo
                                label="Valor Hectare para Arrendamento Em %	"
                            >

                            </v-text-field>
                        </v-col>


                        <v-col
                            cols="12"
                            lg="4"
                        >
                            <v-text-field
                                v-model="cotacao.ValorHectareArrendamento"
                                solo
                                v-on:keyup="sacasArrendamento(cotacao)"
                                label="Valor Do Hectare para Arrendamento Em R$	"
                            >

                            </v-text-field>
                        </v-col>


                        <v-col
                            cols="12"
                            lg="4"
                        >
                            <v-text-field
                                v-model="cotacao.QuantidadeSacasArrendamento"
                                solo
                                label="Valor em Sacas"
                            >

                            </v-text-field>
                        </v-col>
                    </v-row>

                </v-container>

                <v-row>
                    <v-col
                        cols="12"
                        lg="12"

                    >
                        <v-btn
                            color="#124057"
                            dark
                            class="mb-2"
                            @click="SalvarCotacao"
                        >
                            Próximo
                        </v-btn>
                    </v-col>
                </v-row>

            </v-form>
        </main>
    </v-app>
</template>


<script>
import Navbar from "./Navbar";
export default {
    components: {Navbar,
        NavbarSimulador: () => import('./TemplateSimuladorAgricultura.vue')},
    data: vm => ({

        valorDolarDolar: '',
        MenorOscilacaoDolar: '',
        MaiorOscilacaoDolar: '',
        valorOsciladoMenor:'',
        valorOsciladoMaior:'',



        valorMenorOscilacao: '',
        valorMaiorOscilacao: '',

        resultadoSalvar: '',


        dialog: false,
        dialogDelete: false,



        cotacao:{

            valorDolarDolar: '',
            MenorOscilacaoDolar: '',
            MaiorOscilacaoDolar: '',
            valorOsciladoMenor:'',
            valorOsciladoMaior:'',
            precosmsacaindustrial: '',
            precosMquiloindustrial: '',
            pesoSacaKgs: '',
            menoroscilacao: '',
            maioroscilacao: '',
            ValorHectareVenda: '',
            QuantidadeSacasVenda:'',
            ValorHectareArrendamento: '',
            QuantidadeSacasArrendamento: '',
            porcentagemValorArrendamento: '',
        },

        auxiliarCalculo: '',
        pesoMandar: '',

    }),




    computed: {
        formTitle () {
            return this.editedIndex === -1 ? 'Cotação' : 'Edit Item'
        },
    },

    watch: {
        dialog (val) {
            val || this.close()
        },
        dialogDelete (val) {
            val || this.closeDelete()
        },
    },

    created () {
        this.initialize()
    },


    methods: {

        dolar(cotacao){

            cotacao['valorOsciladoMenor']= +cotacao['valorDolarDolar']+(cotacao['valorDolarDolar']*cotacao['MenorOscilacaoDolar']/100)
        },

        dolar2(cotacao){
            //  valorDolarDolar: '',
            //MenorOscilacaoDolar: '',
              //  MaiorOscilacaoDolar: '',
              //  valorOsciladoMenor:'',
               // valorOsciladoMaior:'',
            cotacao['valorOsciladoMaior']= +cotacao['valorDolarDolar']+(cotacao['valorDolarDolar']*cotacao['MaiorOscilacaoDolar']/100)
        },

        sacasVenda(cotacao){
            cotacao['QuantidadeSacasVenda'] = +cotacao['ValorHectareVenda']/cotacao['precosmsacaindustrial']

        },

        sacasArrendamento(cotacao){
            cotacao['QuantidadeSacasArrendamento'] = +cotacao['ValorHectareArrendamento']/cotacao['precosmsacaindustrial']

        },

        SalvarCotacao (){
            this.cotacao.culturas = this.culturas;

            axios.post('verificarCotacaoCadastrada',this.cotacao).then(response => {
                this.resultadoSalvar= response.data;
                if(this.resultadoSalvar){
                    axios.post('SalvarCotacoes',this.cotacao).then(response => {
                        this.resultadoSalvar= response.data;
                        this.$router.push('ciclo')
                    })
                }else{
                    axios.post('editarCotacao',this.cotacao).then(response => {
                        this.resultadoSalvar= response.data;
                        this.$router.push('ciclo')
                    })
                }
            })

          /*  axios.post('SalvarCotacoes',this.cotacao).then(response => {
                this.resultadoSalvar= response.data;
                this.$router.push('ciclo')
            })/*/
        },



        initialize() {


            axios.post('culturas').then(response=>{
                this.culturasget = response.data;

                for(var i=0;i<this.culturasget.length;i++){
                    this.culturaspassar =
                        {
                            name: this.culturasget[i]['nomeProduto'],

                        },
                        this.culturas.push(this.culturaspassar);
                }

            })


            //this.propriedades = [
            //    {
            //      name: 'Frozen Yogurt',
            //    proprietarios: 159,
            //  cpf: 6.0,

            // },
            //{
            //  name: 'Ice cream sandwich',
            //  proprietarios: 237,
            //  cpf: 9.0,

            // },
            //]
        },

        editItem (item) {
            this.editedIndex = this.culturas.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },

        deleteItem (item) {
            this.editedIndex = this.culturas.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialogDelete = true
        },

        deleteItemConfirm () {
            /* axios.post('/deletarPropriedade', this.editedItem)
                 .then(response=>{

                 })
                 .finally(()=>{

                 })*/
            this.culturas.splice(this.editedIndex, 1)
            this.closeDelete()
        },

        close () {
            this.dialog = false
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },

        closeDelete () {
            this.dialogDelete = false
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },

        save () {

            //precosmsacaindustrial: '',
              //  precosMquiloindustrial: '',
                //pesoSacaKgs: '',
               // menoroscilacao: '',
               // maioroscilacao: '',
               // ValorHectareVenda: '',
               // QuantidadeSacasVenda:'',
               // ValorHectareArrendamento: '',
               // QuantidadeSacasArrendamento: '',
               // porcentagemValorArrendamento: '',



            this.editedItem['precosMquiloindustrial'] = this.editedItem['precosmsacaindustrial']/this.editedItem['pesoSacaKgs']
            this.editedItem['valorMenorOscilacao'] = +this.editedItem['precosmsacaindustrial']+this.editedItem['precosmsacaindustrial']*(this.editedItem['menoroscilacao']/100)
            this.editedItem['valorMaiorOscilacao'] = +this.editedItem['precosmsacaindustrial']+this.editedItem['precosmsacaindustrial']*(this.editedItem['maioroscilacao']/100)
            this.editedItem['QuantidadeSacasVenda'] = +this.editedItem['ValorHectareVenda']/this.editedItem['precosmsacaindustrial']
            this.editedItem['QuantidadeSacasArrendamento'] = +this.editedItem['ValorHectareArrendamento']/this.editedItem['precosmsacaindustrial']

            axios.post('mandarPeso', this.editedItem)
                .then(response=>{

                })

            if (this.editedIndex > -1) {
                /* axios.post('/editarPropriedade', this.propriedades[this.editedIndex])
                     .then(response=>{

                     })
                     .finally(()=>{

                     })*/

                Object.assign(this.culturas[this.editedIndex], this.editedItem)
            } else {
                /*axios.post('/cadastrarPropriedade', this.editedItem)
                    .then(response=>{

                    })
                    .finally(()=>{

                    })*/
                this.culturas.push(this.editedItem)
            }
            this.close()
        },


    },

}
</script>
