<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Склады
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="consumable in consumables">
                        <th scope="row">{{ consumable.id }}</th>
                        <td>
                           <p>{{ consumable.name }}</p>
                        </td>

                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</template>

<script>
import axios from 'axios'

export default {
    data: () => ({
        consumables : {},

    }),
    created() {
        this.getConsumables()
    },
    methods: {
        getConsumables() {
            axios.get('/consumables/')
                .then(response => {
                    this.consumables = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
