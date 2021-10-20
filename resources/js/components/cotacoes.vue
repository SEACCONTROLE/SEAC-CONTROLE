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
                        >Valor Dólar</h1>
                    </v-col>
                </v-row>

                </v-container>

                <v-container fluid>
                <v-row justify="center">

                    <v-col cols="4"
                    lg="2">
                        <v-subheader>Valor em Dolar</v-subheader>
                    </v-col>
                    <v-col
                        cols="4"
                        lg="2"
                    >
                        <v-text-field
                            v-model="cotacao.valorDolarDolar"
                            outlined
                            v-mask="'#.##'"
                        >

                        </v-text-field>
                    </v-col>

                    <v-col cols="4"
                           lg="2">
                        <v-subheader>Porcentagem da Menor Oscilação</v-subheader>
                    </v-col>
                    <v-col
                        cols="4"
                        lg="2"
                    >
                        <v-text-field
                            v-model="cotacao.MenorOscilacaoDolar"
                            v-on:keyup="dolar(cotacao)"
                            outlined

                            v-mask="'-###'"
                        >

                        </v-text-field>
                    </v-col>

                    <v-col cols="4"
                           lg="2">
                        <v-subheader>Porcentagem da Maior Oscilação</v-subheader>
                    </v-col>
                    <v-col
                        cols="4"
                        lg="2"
                    >
                        <v-text-field
                            v-model="cotacao.MaiorOscilacaoDolar"
                            v-on:keyup="dolar2(cotacao)"
                            outlined
                            v-mask="'###'"

                        >

                        </v-text-field>
                    </v-col>
                </v-row>
                    <v-row justify="center">

                        <v-col cols="4"
                               lg="3">
                            <v-subheader>Valor Menor Oscilação</v-subheader>
                        </v-col>
                    <v-col
                        cols="4"
                        lg="3"
                    >

                            <v-text-field
                                v-model="cotacao.valorOsciladoMenor"
                                outlined
                                disabled
                            >

                            </v-text-field>


                    </v-col>

                        <v-col cols="4"
                               lg="3">
                            <v-subheader>Valor Maior Oscilação</v-subheader>
                        </v-col>

                    <v-col
                        cols="4"
                        lg="3"
                    >

                            <v-text-field
                                v-model="cotacao.valorOsciladoMaior"
                                outlined
                                disabled
                            >

                            </v-text-field>


                    </v-col>
                    </v-row>
                </v-container>


                <v-container fluid>
                    <v-row>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Preço da Saca Atual</v-subheader>
                        </v-col>
                    <v-col
                        cols="4"
                        lg="2"
                    >

                            <v-text-field
                                v-model="cotacao.precosmsacaindustrial"
                                outlined
                                v-on:keyup="precoMedio(cotacao)"
                                v-mask="'###.##'"
                            >

                            </v-text-field>


                    </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Peso Saca Kgs</v-subheader>
                        </v-col>
                    <v-col
                        cols="4"
                        lg="2"
                    >

                            <v-text-field
                                v-model="cotacao.pesoSacaKgs"
                                outlined
                                v-on:keyup="precoMedio(cotacao)"
                                v-mask="'###.##'"
                            >

                            </v-text-field>


                    </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Preço Médio Kilo</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="2"
                        >

                                <v-text-field
                                    v-model="cotacao.precosMquiloindustrial"
                                    outlined
                                    disabled
                                >

                                </v-text-field>


                        </v-col>

                    </v-row>


                    <v-row>

                        <v-col cols="4"
                               lg="3">
                            <v-subheader>Valor de Oscilação Positiva da Saca</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="3"
                        >

                                <v-text-field
                                    v-model="cotacao.valorMaiorOscilacao"
                                    outlined
                                    disabled
                                >

                                </v-text-field>


                        </v-col>

                        <v-col cols="4"
                               lg="3">
                            <v-subheader>Valor de Oscilação Negativa da Saca</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="3"
                        >

                                <v-text-field
                                    v-model="cotacao.valorMenorOscilacao"
                                    outlined
                                    disabled
                                >

                                </v-text-field>


                        </v-col>

                    </v-row>



                    <v-row>
                        <v-col
                            cols="12"
                            lg="12"
                        >
                            <h1
                                class="text-center"
                            >Valor Terra Nua</h1>
                        </v-col>
                    </v-row>

                </v-container>

                <v-container fluid>
                    <v-row justify="center">

                        <v-col cols="6"
                               lg="3">
                            <v-subheader>Valor Do Hectare para Venda em R$</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="3"
                        >
                            <v-text-field
                                v-model="cotacao.ValorHectareVenda"
                                outlined
                                v-on:keyup="sacasVenda(cotacao)"
                                v-mask="'###.##'"
                            >

                            </v-text-field>
                        </v-col>

                        <v-col cols="6"
                               lg="3">
                            <v-subheader>Valor em Sacas</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="3"
                        >
                            <v-text-field
                                v-model="cotacao.QuantidadeSacasVenda"
                                outlined
                                disabled
                                label="Valor em Sacas"
                            >

                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Valor Hectare para Arrendamento Em %</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="2"
                        >
                            <v-text-field
                                v-model="cotacao.porcentagemValorArrendamento"
                                outlined
                                v-mask="'###'"
                            >

                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Valor Do Hectare para Arrendamento Em R$</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="2"
                        >
                            <v-text-field
                                v-model="cotacao.ValorHectareArrendamento"
                                outlined
                                v-on:keyup="sacasArrendamento(cotacao)"
                                label="Valor Do Hectare para Arrendamento Em R$	"
                                v-mask="'###.##'"
                            >

                            </v-text-field>
                        </v-col>


                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Valor em Sacas</v-subheader>
                        </v-col>

                        <v-col
                            cols="4"
                            lg="2"
                        >
                            <v-text-field
                                v-model="cotacao.QuantidadeSacasArrendamento"
                                outlined
                                disabled
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
            valorMenorOscilacao: '',
            valorMaiorOscilacao: '',
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

        precoMedio(cotacao){

            // precosmsacaindustrial: '',
           // precosMquiloindustrial: '',
           //     pesoSacaKgs: '',
             //   menoroscilacao: '',
              //  maioroscilacao: '',
               // ValorHectareVenda: '',
               //  QuantidadeSacasVenda:'',
               // ValorHectareArrendamento: '',
               // QuantidadeSacasArrendamento: '',
               // porcentagemValorArrendamento: '',
            //valorMenorOscilacao: '',
              //  valorMaiorOscilacao: '',

            cotacao['precosMquiloindustrial']= cotacao['precosmsacaindustrial']/cotacao['pesoSacaKgs']
            cotacao['valorMaiorOscilacao']= +cotacao['precosmsacaindustrial']+cotacao['precosmsacaindustrial']*(cotacao['MaiorOscilacaoDolar']/100)
            cotacao['valorMenorOscilacao'] = +cotacao['precosmsacaindustrial']+cotacao['precosmsacaindustrial']*(cotacao['MenorOscilacaoDolar']/100)

        },


        sacasVenda(cotacao){
            cotacao['QuantidadeSacasVenda'] = +cotacao['ValorHectareVenda']/cotacao['precosmsacaindustrial']

        },

        sacasArrendamento(cotacao){
            cotacao['QuantidadeSacasArrendamento'] = +cotacao['ValorHectareArrendamento']/cotacao['precosmsacaindustrial']

        },

        SalvarCotacao (){
            //this.cotacao.culturas = this.culturas;
            this.$router.push('ciclo')
            /*
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
 */

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
