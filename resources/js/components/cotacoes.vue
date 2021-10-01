<template>
    <v-app>
        <NavbarSimulador></NavbarSimulador>
        <main>
            <v-form v-model="valid">
                <token-use></token-use>

                <v-row>
                    <v-col
                    cols="12"
                    lg="12"
                    >
                        <h1
                            class="text-center"
                        >Cotações</h1>
                    </v-col>
                </v-row>

                <v-container>
                <v-row justify="center">
                    <v-col
                        cols="12"
                        lg="4"
                    >
                        <v-text-field
                            v-model="cotacao.valorDolarDolar"
                        label="Valor em Dolar"
                        >

                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        lg="3"
                    >
                        <v-text-field
                            v-model="cotacao.MenorOscilacaoDolar"
                            v-on:keyup="dolar(cotacao)"
                            label="Porcentagem da Menor Oscilação"
                        >

                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        lg="3"
                    >
                        <v-text-field
                            v-model="cotacao.MaiorOscilacaoDolar"
                            v-on:keyup="dolar2(cotacao)"
                            label="Porcentagem da Maior Oscilação"

                        >

                        </v-text-field>
                    </v-col>
                </v-row>
                    <v-row justify="center">
                    <v-col
                        cols="12"
                        lg="4"
                    >
                        <v-flex xs12 sm6>

                            <v-text-field
                                v-model="cotacao.valorOsciladoMenor"
                                readonly
                                label="Valor Menor Oscilação"
                            >

                            </v-text-field>

                        </v-flex>

                    </v-col>

                    <v-col
                        cols="12"
                        lg="4"
                    >
                        <v-flex xs12 sm6>

                            <v-text-field
                                v-model="cotacao.valorOsciladoMaior"
                                readonly
                                label="Valor Maior Oscilação"
                            >

                            </v-text-field>

                        </v-flex>

                    </v-col>
                    </v-row>
                </v-container>


                <v-row>
                    <v-col
                        cols="12"
                        lg="12"
                    >
                    <v-data-table
                        :headers="headers"
                        :items="culturas"
                        sort-by="precoMedioSacaIndustrial"
                        class="elevation-1"
                    >
                        <template v-slot:top>
                            <v-toolbar
                                flat
                            >
                                    <v-toolbar-title>Valores Cereais e Oscilações</v-toolbar-title>
                                <v-divider
                                    class="mx-4"
                                    inset
                                    vertical
                                ></v-divider>
                                <v-spacer></v-spacer>
                                <v-dialog
                                    v-model="dialog"
                                    max-width="1000px"
                                >
                                    <template v-slot:activator="{on, attrs}">
                                        <v-btn
                                            color="#124057"
                                            dark
                                            class="mb-2"
                                            v-bind="attrs"
                                            v-on="on"
                                        >
                                            Cadastrar Nova Oscilação de Preços
                                        </v-btn>
                                    </template>
                                    <v-card>

                                        <v-card-title>
                                            <span class="text-h5">{{ formTitle }}</span>
                                        </v-card-title>

                                        <v-card-text>
                                            <v-container>
                                                <v-row>
                                                    <v-col
                                                        cols="6"
                                                        sm="6"
                                                        md="12"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.name"
                                                            label="Cultura"
                                                        ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                        cols="12"
                                                        sm="6"
                                                        md="6"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.precosmsacaindustrial"
                                                            label="Preço Médio da Saca"
                                                        ></v-text-field>
                                                    </v-col>

                                                    <v-col
                                                        cols="12"
                                                        sm="6"
                                                        md="6"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.pesoSacaKgs"
                                                            label="Peso Médio da Saca em Kgs"
                                                        ></v-text-field>
                                                    </v-col>


                                                </v-row>

                                                <v-row>





                                                    <v-col
                                                        cols="12"
                                                        sm="6"
                                                        md="6"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.menoroscilacao"
                                                            label="% de Menor Oscilação"
                                                        ></v-text-field>
                                                    </v-col>


                                                    <v-col
                                                        cols="12"
                                                        sm="6"
                                                        md="6"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.maioroscilacao"
                                                            label="% de Maior Oscilação"
                                                        ></v-text-field>
                                                    </v-col>
                                                    </v-row>

                                                    <v-toolbar-title>Valor Terra Nua</v-toolbar-title>
                                                    <v-row>
                                                    <v-col
                                                        cols="12"
                                                        lg="8"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.ValorHectareVenda"
                                                            label="Valor Hectare para venda em R$"
                                                        >

                                                        </v-text-field>
                                                    </v-col>


                                                    <v-col
                                                        cols="12"
                                                        lg="8"
                                                    >
                                                        <v-text-field
                                                            v-model="editedItem.ValorHectareArrendamento"
                                                            label="Valor Hectare para Arrendamento em R$"
                                                        >

                                                        </v-text-field>
                                                    </v-col>


                                                        <v-col
                                                            cols="12"
                                                            lg="8"
                                                        >
                                                            <v-text-field
                                                                v-model="editedItem.porcentagemValorArrendamento"
                                                                label="Valor Hectare para Arrendamento Em %"
                                                            >

                                                            </v-text-field>
                                                        </v-col>


                                                </v-row>
                                            </v-container>
                                        </v-card-text>

                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                color="blue darken-1"
                                                text
                                                @click="close"
                                            >
                                                Cancel
                                            </v-btn>
                                            <v-btn
                                                color="blue darken-1"
                                                text
                                                @click="save"
                                            >
                                                Save
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                                <v-dialog v-model="dialogDelete" max-width="500px">
                                    <v-card>
                                        <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                            <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                            <v-spacer></v-spacer>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                            </v-toolbar>
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <v-icon
                                small
                                class="mr-2"
                                @click="editItem(item)"
                            >
                                mdi-pencil
                            </v-icon>
                            <v-icon
                                small
                                @click="deleteItem(item)"
                            >
                                mdi-delete
                            </v-icon>
                        </template>

                    </v-data-table>
                    </v-col>
                </v-row>




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
                            Salvar Dados
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
        headers: [
            {
                text: 'Cultura',
                align: 'start',
                sortable: false,
                value: 'name',
            },
            { text: 'Preco Médio da Saca', value: 'precosmsacaindustrial' },
            { text: 'Preco Médio Quilo', value: 'precosMquiloindustrial'},
            { text: 'Peso Médio da Saca em Kgs', value: 'pesoSacaKgs'},
            { text: '% de Menor Oscilação', value: 'menoroscilacao'},
            { text: 'Valor da Menor Oscilação', value: 'valorMenorOscilacao'},
            { text: '% de Maior Oscilação', value: 'maioroscilacao'},
            { text: 'Valor da Maior Oscilação', value: 'valorMaiorOscilacao'},
            { text: 'Valor Do Hectare para Venda em R$', value: 'ValorHectareVenda'},
            { text: 'Quantidade de Sacas (Venda)', value: 'QuantidadeSacasVenda'},
            { text: 'Valor Hectare para Arrendamento Em %', value: 'porcentagemValorArrendamento'},
            { text: 'Valor Do Hectare para Arrendamento Em R$', value: 'ValorHectareArrendamento'},
            { text: 'Quantidade de Sacas (Arrendamento)', value: 'QuantidadeSacasArrendamento'},


            { text: 'Actions', value: 'actions', sortable: false },
        ],
        culturas: [],
        editedIndex: -1,
        editedItem: {
            name: '',
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
        defaultItem: {
            name: '',
            precosmsacaindustrial: '',
            precosMquiloindustrial: '',
            pesoSacaKgs: '',
            menoroscilacao: '',
            valorMenorOscilacao: '',
            maioroscilacao: '',
            valorMaiorOscilacao: '',
            ValorHectareVenda: '',
            QuantidadeSacasVenda:'',
            ValorHectareArrendamento: '',
            QuantidadeSacasArrendamento: '',
            porcentagemValorArrendamento: '',

        },


        cotacao:{
            culturas: [],
            valorDolarDolar: '',
            MenorOscilacaoDolar: '',
            MaiorOscilacaoDolar: '',
            valorOsciladoMenor:'',
            valorOsciladoMaior:'',
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
