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
                        <th scope="col">name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="storage in storages">
                        <th scope="row">{{ storage.id }}</th>
                        <td>
                            <router-link :to="'/storages/' + storage.id" class="nav-a">{{ storage.name }}</router-link>
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
        storages : {},

    }),
    created() {
        this.getStorage()
    },
    methods: {
        getStorage() {
            axios.get('/storages/')
                .then(response => {
                    this.storages = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
