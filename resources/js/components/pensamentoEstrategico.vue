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
                            >Pensamento Estratégico</h1>
                        </v-col>
                    </v-row>

                </v-container>

                <v-container fluid>
                    <v-row justify="center">

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Área Total Talhão/Há</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.areaTotalTalhao"
                                outlined
                                v-on:keyup="areaDisponivelHa(pensamento)"
                                v-mask="'###.#'"
                            >
                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Área Disponível Talhão Para Uso %</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.areaDisponivelTalhao"
                                outlined
                                v-on:keyup="areaDisponivelHa(pensamento)"
                                v-mask="'###'"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Área Disponível De Uso Em Há</v-subheader>
                        </v-col>
                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.areaDisponivelEmHa"
                                outlined
                                disabled
                                v-mask="'###.#'"
                            >
                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Estimativa De Kgs/Há</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.estimativaKgs"
                                outlined
                                v-mask="'###.###'"
                            >
                            </v-text-field>
                        </v-col>

                    </v-row>

                    <v-row justify="center">

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Peso Médio Por Saca Em Kgs</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.pesoMedioSacaKgs"
                                outlined
                                disabled
                            >
                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Estimativa Colheita Em Kgs</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.estimativaColheitaKgs"
                                outlined
                                disabled
                            >
                            </v-text-field>
                        </v-col>

                    </v-row>




                    <v-row justify="center">

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Estimatima Colheita Scs/Ha</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.estimativaColheitasSacasHa"
                                outlined
                                disabled
                            >
                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Estimativa Colheita Total Em Sacas</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.estimativaColheitaTotalSacas"
                                outlined
                                disabled
                            >
                            </v-text-field>
                        </v-col>

                    </v-row>


                    <v-row justify="center">

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Estimativa Valor De Venda Saca R$</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.estimativaValorVenda"
                                outlined
                                disabled
                            >
                            </v-text-field>
                        </v-col>

                        <v-col cols="4"
                               lg="2">
                            <v-subheader>Desejo De Margem Liquida em %/Sc</v-subheader>
                        </v-col>

                        <v-col
                            cols="6"
                            lg="2"
                        >
                            <v-text-field
                                v-model="pensamento.desejoMargemLiquida"
                                outlined
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
    components: {
        NavbarSimulador: () => import('./TemplateSimuladorAgricultura.vue')},

    data: () => ({
        dialog: false,
        dialogDelete: false,



        pensamento: {
            areaTotalTalhao: '',
            areaDisponivelTalhao: '',
            areaDisponivelEmHa: '',
            estimativaKgs: '',
            pesoMedioSacaKgs: '',
            estimativaColheitaKgs: '',
            estimativaColheitasSacasHa: '',
            estimativaColheitaTotalSacas: '',
            desejoMargemLiquida: '',
            estimativaValorVenda: '',
        },

    }),

    computed: {
        formTitle () {
            return this.editedIndex === -1 ? 'Nova Cultura' : 'Edit Item'
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

        areaDisponivelHa(pensamento){
            pensamento['areaDisponivelEmHa'] = pensamento['areaTotalTalhao']*pensamento['areaDisponivelTalhao']/100
        },



        initialize() {


            axios.post('culturas').then(response=>{
                this.culturasget = response.data;

                for(var i=0;i<this.culturasget.length;i++){
                    this.culturaspassar =
                        {
                            name: this.culturasget[i]['nomeProduto'],
                            cultivar: this.culturasget[i]['variedadeCultivada']
                        },
                        this.culturas.push(this.culturaspassar);
                }

            })


            axios.post('getPensamentos').then(response=>{
                this.culturasget = response.data;

                for(var i=0;i<this.culturasget.length;i++){
                    this.culturaspassar =
                        {
                            areaDisponivelTalhao: this.culturasget[i]['areaDisponivelTalhao'],
                            areaDisponivelEmHa: this.culturasget[i]['areaDisponivelEmHa'],
                            areaTotalTalhao: this.culturasget[i]['areaTotalTalhao'],
                            cultivar: this.culturasget[i]['cultivar'],
                            name: this.culturasget[i]['cultura'],
                            desejoMargemLiquida: this.culturasget[i]['desejoMargemLiquida'],
                            estimativaColheitaKgs: this.culturasget[i]['estimativaColheitaKgs'],
                            estimativaColheitaTotalSacas: this.culturasget[i]['estimativaColheitaTotalSacas'],

                            estimativaColheitasSacasHa: this.culturasget[i]['estimativaColheitasSacasHa'],
                            estimativaKgs: this.culturasget[i]['estimativaKgs'],
                            idTalhao: this.culturasget[i]['idTalhao'],
                            pesoMedioSaca: this.culturasget[i]['pesoMedioSaca'],
                            sistemaPlantio: this.culturasget[i]['sistemaPlantio'],
                        },
                        this.culturas.push(this.culturaspassar);
                }

            })

            axios.post('getPeso').then(response=>{
                this.pesoMedioSaca = response.data;
            })

            axios.post('getPrecoSaca').then(response=>{
                this.precoSaca = response.data;
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

               /* idTalhao: '',
                sistemaPlantio: '',
                areaTotalTalhao: '',
                areaDisponivelTalhao: '',
                areaDisponivelEmHa: '',
                estimativaKgs: '',
                pesoMedioSacaKgs: '',
                estimativaColheitaKgs: '',
                estimativaColheitasSacasHa: '',
                estimativaColheitaTotalSacas: '',
                estimativaValorSacaRS: '',
                desejoMargemLiquida: '',
                desejoValorVenda: '',*/

            this.editedItem['pesoMedioSacaKgs'] = this.pesoMedioSaca;
            this.editedItem['estimativaValorSacaRS'] = this.precoSaca
            this.editedItem['areaDisponivelEmHa'] = this.editedItem['areaTotalTalhao']*this.editedItem['areaDisponivelTalhao']/100
            this.editedItem['estimativaColheitaKgs'] = this.editedItem['estimativaKgs']*this.editedItem['pesoMedioSacaKgs']
            this.editedItem['estimativaColheitasSacasHa'] = this.editedItem['estimativaKgs']/this.editedItem['pesoMedioSacaKgs']
            this.editedItem['estimativaColheitaTotalSacas'] = this.editedItem['areaDisponivelEmHa']*this.editedItem['estimativaColheitasSacasHa']




            if (this.editedIndex > -1) {
                /* axios.post('/editarPropriedade', this.propriedades[this.editedIndex])
                     .then(response=>{

                     })
                     .finally(()=>{

                     })*/

                Object.assign(this.culturas[this.editedIndex], this.editedItem)
            } else {
                this.pensamento.culturas = this.culturas;
                axios.post('SalvarPensamento',this.editedItem).then(response => {
                    this.resultadoSalvar= response.data;
                    //location.reload()
                })
                this.culturas.push(this.editedItem)
            }
            this.close()
        },
    },
}
</script>
