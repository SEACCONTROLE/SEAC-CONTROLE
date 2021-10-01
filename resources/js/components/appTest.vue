<template>
    <v-form v-model="valid">
        <v-container>
            <v-row>
                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="usuario.firstname"
                        :rules="nameRules"
                        :counter="10"
                        label="First name"
                        required
                    ></v-text-field>
                </v-col>

                <v-btn color='primary'@click="validateField">
                    Enviar
                </v-btn>
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
export default {
    data: () => ({
        valid: false,
        firstname: '',
        lista: [],
        usuario: {username: '',
        firstname: ''},
        lastname: '',
        nameRules: [
            v => !!v || 'Name is required',
            v => v.length <= 10 || 'Name must be less than 10 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+/.test(v) || 'E-mail must be valid',
        ],
    }),

    methods: {
        validateField () {
            axios.post('/teste',this.usuario)
            .then(response=>{

            })
            .finally(()=>{

            })
        },
        buscarList(){
            axios.get('/lista').then(response=>{
                this.lista = response.data();
            })
        }
    },


}
</script>
