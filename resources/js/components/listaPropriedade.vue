<template>
    <v-app>
        <NavbarUsuario></NavbarUsuario>
    <v-data-table
        :headers="headers"
        :items="propriedades"
        sort-by="proprietario"
        class="elevation-1"
        :loading="loadingTable"
        loading-text="Carregando... espere um momento"
    >
        <template v-slot:top>
            <v-toolbar
                flat
            >
                <v-toolbar-title>Propriedades</v-toolbar-title>
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
                            Nova Propriedade
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
                                            label="Nome da Propriedade"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="editedItem.proprietario"
                                            label="Proprietario"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="editedItem.cpf"
                                            label="CPF do Dono"
                                            v-mask="'###.###.###-##'"
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

            <v-icon
                small
                @click="Cotacoes(item)"
            >
                Simular
            </v-icon>



        </template>

    </v-data-table>


    </v-app>



</template>

<script>
import Navbar from "./Navbar";
export default {
    components: {Navbar,
        NavbarUsuario: () => import('./templateUsuario.vue')},
    data: () => ({
        dialog: false,
        dialogDelete: false,
        headers: [
            {
                text: 'Propriedade',
                align: 'start',
                sortable: false,
                value: 'name',
            },
            { text: 'Proprietario', value: 'proprietario' },
            { text: 'CPF', value: 'cpf' },
            { text: 'Actions', value: 'actions', sortable: false },
        ],
        propriedades: [],
        propriedadesget: [],
        propriedadespassar: [],
        editedIndex: -1,
        resposta: '',
        loadingTable: true,
        propriedadesEditar: {
            editItem:'',
            novoItem: ''
        },

        editedItem: {
            name: '',
            proprietario: '',
            cpf: '',
        },
        defaultItem: {
            name: '',
            proprietario: '',
            cpf: '',
        },
    }),

    computed: {
        formTitle () {
            return this.editedIndex === -1 ? 'Nova Propriedade' : 'Edit Item'
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

        Cotacoes (item){
            axios.post('iniciarCotacao').then(response=> {
                this.$router.push('culturasMercado')
            });

        },

        initialize() {

            axios.post('propriedades').then(response=>{
                this.propriedadesget = response.data;
                for(var i=0;i<this.propriedadesget.length;i++){
                    this.propriedadespassar =
                        {
                            name: this.propriedadesget[i]['nome'],
                            proprietario: this.propriedadesget[i]['proprietario'],
                            cpf: this.propriedadesget[i]['cpf']
                        },
                        this.propriedades.push(this.propriedadespassar);
                }
                this.loadingTable = false;
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
            this.editedIndex = this.propriedades.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },

        deleteItem (item) {
            this.editedIndex = this.propriedades.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialogDelete = true
        },

        deleteItemConfirm () {
            axios.post('deletarPropriedade', this.editedItem)
                .then(response=>{

                })
                .finally(()=>{

                })
            this.propriedades.splice(this.editedIndex, 1)
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
            if (this.editedIndex > -1) {

                //this.propriedadesEditar.editItem = this.propriedades[this.editedIndex];
                //this.propriedadesEditar.novoItem = this.editedItem;

                axios.post('editarPropriedade', this.propriedades[this.editedIndex])
                    .then(response=>{

                    })
                    .finally(()=>{

                    })

                Object.assign(this.propriedades[this.editedIndex], this.editedItem)
            } else {
                axios.post('/cadastrarPropriedade', this.editedItem)
                    .then(response=>{

                    })
                    .finally(()=>{

                    })
                this.propriedades.push(this.editedItem)
            }
            this.close()
        },
    },
}
</script>
