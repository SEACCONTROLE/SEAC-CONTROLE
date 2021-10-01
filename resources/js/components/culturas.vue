<template>
    <v-app>
        <NavbarUsuario></NavbarUsuario>
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
                    <v-toolbar-title>Culturas</v-toolbar-title>
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
                                            md="6"
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
                                                v-model="editedItem.cultivar"
                                                label="Cultivar"
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
                                    @click="save(item)"
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
    components: {Navbar,
        NavbarUsuario: () => import('./templateUsuario.vue')},
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
            { text: 'Actions', value: 'actions', sortable: false },
        ],
        culturas: [],
        culturasget: [],
        culturaspassar: [],


        editedIndex: -1,

        culturasEditar: {
            editItem:'',
            novoItem: ''
        },

        editedItem: {
            name: '',
            cultivar: '',

        },
        defaultItem: {
            name: '',
            cultivar: '',

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
            axios.post('deletarCultura', this.editedItem)
                .then(response=>{

                })
                .finally(()=>{

                })
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

        save (item) {
            if (this.editedIndex > -1) {
                this.culturasEditar.editItem = this.culturas[this.editedIndex];
                this.culturasEditar.novoItem = this.editedItem;
                axios.post('editarCultura', this.culturasEditar)
                    .then(response=>{

                    })
                    .finally(()=>{

                    })

                Object.assign(this.culturas[this.editedIndex], this.editedItem)
            } else {
                axios.post('cadastrarCultura', this.editedItem)
                    .then(response=>{

                    })
                    .finally(()=>{

                    })
                this.culturas.push(this.editedItem)
            }
            this.close()
        },
    },
}
</script>
