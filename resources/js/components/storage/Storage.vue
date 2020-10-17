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
            <div class="col-12">

                <div class="alert alert-primary" role="alert">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Остаток</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="consumable in consumables">
                            <td>{{ consumable.name }}</td>
                            <td>{{ consumable.value }} <b> {{ consumable.description }}</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
import axios from 'axios'

export default {
    data: () => ({
        storageId: 0,
        storage : {},
        consumables: {},

    }),
    created() {
        this.storageId = this.$route.params.id;
        this.getStorage()
        this.getConsumables()
    },
    methods: {
        getStorage() {
            axios.get('/storages/' + this.storageId)
                .then(response => {
                    this.storage = response.data
                });
        },
        getConsumables() {
            axios.get('/consumables/storage/' + this.storageId)
                .then(response => {
                    this.consumables = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
