<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Склад: {{ storage.name }}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">

                <div class="alert alert-primary" role="alert">
                    Кофе-бар: {{ storage.name }}
                </div>

            </div>
            <div class="col-6">

                <div class="alert alert-primary" role="alert">
                    Кофе-бар: {{ storage.name }}
                </div>

            </div>
        </div>

    </div>

</template>

<script>
import axios from 'axios'

export default {
    data: () => ({
        consumableId: 0,
        consumable : {},

    }),
    created() {
        this.storageId = this.$route.params.id;
        this.getConsumable()
    },
    methods: {
        getConsumable() {
            axios.get('/consumables/' + this.consumableId)
                .then(response => {
                    this.consumable = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
