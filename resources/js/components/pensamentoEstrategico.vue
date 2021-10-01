<template>
    <v-app>
        <NavbarSimulador></NavbarSimulador>


        <v-data-table
            :headers="headers"
            :items="culturas"
            sort-by="cultivar"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar
                    flat
                >


                    <v-toolbar-title>Objetivos Operacionais</v-toolbar-title>


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
                                Nova Cultura
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
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.name"
                                                label="Cultura"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.cultivar"
                                                label="Cultivar"
                                            ></v-text-field>
                                        </v-col>


                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.idTalhao"
                                                label="Identificação do Talhao"
                                            ></v-text-field>
                                        </v-col>


                                        <v-col
                                            cols="12"
                                            lg="3"
                                        >
                                            <v-text-field
                                                v-model="editedItem.sistemaPlantio"
                                                label="Sistema De Plantio"
                                            >

                                            </v-text-field>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            lg="3"
                                        >
                                            <v-text-field
                                                v-model="editedItem.areaTotalTalhao"
                                                label="Área Total Talhão/Há"
                                            >

                                            </v-text-field>
                                        </v-col>


                                        <v-col
                                            cols="12"
                                            lg="3"
                                        >
                                            <v-text-field
                                                v-model="editedItem.areaDisponivelTalhao"
                                                label="Área Disponível Talhão Para Uso %"
                                            >

                                            </v-text-field>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            lg="3"
                                        >
                                            <v-text-field
                                                v-model="editedItem.estimativaKgs"
                                                label="Estimativa De Kgs/Há"
                                            >

                                            </v-text-field>
                                        </v-col>


                                        <v-col
                                            cols="12"
                                            lg="3"
                                        >
                                            <v-text-field
                                                v-model="editedItem.desejoMargemLiquida"
                                                label="Desejo De Margem Liquida em %/Sc"
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
        headers: [
            {
                text: 'Cultura',
                align: 'start',
                sortable: false,
                value: 'name',
            },
            { text: 'Cultivar', value: 'cultivar' },
            { text: 'Identificação do Talhão', value: 'idTalhao'},
            { text: 'Sistema De Plantio', value: 'sistemaPlantio' },
            { text: 'Área Total Talhão/Há', value: 'areaTotalTalhao' },
            { text: 'Área Disponível Talhão Para Uso %', value: 'areaDisponivelTalhao' },
            { text: 'Área Disponível De Uso Em Há', value: 'areaDisponivelEmHa'},
            { text: 'Estimativa De Kgs/Há', value: 'estimativaKgs' },
            { text: 'Peso Médio Por Saca Em Kgs', value: 'pesoMedioSacaKgs'},
            { text: 'Estimativa Colheita Em Kgs', value: 'estimativaColheitaKgs' },
            { text: 'Estimatima Colheita Scs/Ha', value: 'estimativaColheitasSacasHa'},
            { text: 'Estimativa Colheita Total Em Sacas', value: 'estimativaColheitaTotalSacas' },
            { text: 'Estimativa Valor De Venda Saca R$', value: 'estimativaValorSacaRS'},
            { text: 'Desejo De Margem Liquida em %/Sc', value: 'desejoMargemLiquida'},
            { text: 'Actions', value: 'actions', sortable: false },
        ],
        culturas: [],
        editedIndex: -1,
        editedItem: {
            name: '',
            cultivar: '',
            idTalhao: '',
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


        },
        defaultItem: {
            name: '',
            cultivar: '',
            idTalhao: '',
            sistemaPlantio: '',
            areaTotalTalhao: '',
            areaDisponivelTalhao: '',
            areaDisponivelEmHa: '',
            estimativaKgs: '',
            pesoMedioSacaKgs: '',
            estimativaColheitaKgs: '',
            estimativaColheitasSacasHa: '',
            estimativaColheitaTotalSacas: '',
            desejoMargemLiquida: '',
        },

        pesoMedioSaca: '',
        precoSaca: '',

        pensamento: {
          culturas: [],
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
