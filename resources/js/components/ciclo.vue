<template>
    <v-app>
        <NavbarSimulador></NavbarSimulador>
        <v-data-table
            :headers="headers"
            :items="ciclos"
            sort-by="proprietario"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar
                    flat
                >
                    <v-toolbar-title>Ciclos</v-toolbar-title>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog
                        v-model="dialog"
                        max-width="500px"
                    >
                        <template v-slot:activator="{on, attrs}">
                            <v-btn
                                color="#124057"
                                dark
                                class="mb-2"
                                v-bind="attrs"
                                v-on="on"
                            >
                                Novo Ciclo
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
                                                v-model="editedItem.inicio"
                                                label="Inicio do Ciclo"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.termino"
                                                label="Termino do Ciclo"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.periodo"
                                                label="Periodo em dias"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="#124057"
                                    text
                                    @click="close"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    color="#124057"
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
                    @click="deleteItem(item)"
                >
                    mdi-delete
                </v-icon>

                <v-icon
                    small
                    @click="Pensamento(item)"
                >
                    Selecionar ciclo
                </v-icon>



            </template>

        </v-data-table>


    </v-app>



</template>

<script>
import Navbar from "./Navbar";
export default {
    components: {Navbar,
        NavbarSimulador: () => import('./TemplateSimuladorAgricultura.vue')},
    data: () => ({
        dialog: false,
        dialogDelete: false,
        headers: [
            {
                text: 'Inicio do Ciclo',
                align: 'start',
                sortable: false,
                value: 'inicio',
            },
            { text: 'Termino do Ciclo', value: 'termino' },
            { text: 'Periodo em dias', value: 'periodo' },
            { text: 'Actions', value: 'actions', sortable: false },
        ],
        ciclos: [],
        ciclosget: [],
        ciclospassar: [],
        editedIndex: -1,
        resposta: '',
        editedItem: {
            inicio: '',
            termino: '',
            periodo: '',
        },
        defaultItem: {
            inicio: '',
            termino: '',
            periodo: '',
        },
    }),

    computed: {
        formTitle () {
            return this.editedIndex === -1 ? 'Novo Ciclo' : 'Edit Item'
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

        Pensamento (item){
            axios.post('iniciarPensamento').then(response=> {
                this.$router.push('pensamento')
            });

        },

        initialize() {

            axios.post('ciclos').then(response=>{
                this.ciclosget = response.data;
                for(var i=0;i<this.ciclosget.length;i++){
                    this.ciclospassar =
                        {
                            inicio: this.ciclosget[i]['dataInicioPlantio'],
                            termino: this.ciclosget[i]['dataFimPlantio'],
                            periodo: this.ciclosget[i]['periodoEmDias']
                        },
                        this.ciclos.push(this.ciclospassar);
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
            this.editedIndex = this.ciclos.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },

        deleteItem (item) {
            this.editedIndex = this.ciclos.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialogDelete = true
        },

        deleteItemConfirm () {
            axios.post('deletarCiclo', this.editedItem)
                .then(response=>{

                })
                .finally(()=>{

                })
            this.ciclos.splice(this.editedIndex, 1)
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

                axios.post('cadastrarCiclo', this.editedItem)
                    .then(response=>{

                    })
                    .finally(()=>{

                    })
                this.ciclos.push(this.editedItem)

            this.close()
        },
    },
}
</script>
