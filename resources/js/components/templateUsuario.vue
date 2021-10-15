<template>
    <v-container fluid class="grey lighten-5">
    <v-footer
        color="#1abc9c"
        padless
    >
        <v-row
            justify="center"
            no-gutters
        >
            <v-btn
                @click="Culturas"
                color="white"
                text
                rounded
                class="my-2"
            >
                Culturas
            </v-btn>


            <v-btn
                @click="Propriedades"
                color="white"
                text
                rounded
                class="my-2"
            >
                Propriedades
            </v-btn>
        </v-row>
    </v-footer>
    </v-container>
</template>

<script>
export default {
    data: () => ({

    }),

    methods: {



        Culturas (){
            this.$router.push('culturas')
        },
        Propriedades (){
            this.$router.push('propriedades')
        }
    }
}
</script>
