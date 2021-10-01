<template>
    <v-footer
        color="#005197"
        padless
    >
        <v-row
            justify="center"
            no-gutters
        >
            <v-btn
                @click="Cotacoes"
                color="white"
                text
                rounded
                class="my-2"
            >
                Cotações
            </v-btn>

            <v-btn
                @click="Ciclo"
                color="white"
                text
                rounded
                class="my-2"
            >
                Pensamento Estratégico

            </v-btn>







        </v-row>
    </v-footer>
</template>

<script>
export default {
    data: () => ({

    }),

    methods: {
        Cotacoes (){
            this.$router.push('cotacoes')
        },
        Pensamento (){
            this.$router.push('pensamento')
        },

        Ciclo (){
            this.$router.push('ciclo')
        }
    }
}
</script>
