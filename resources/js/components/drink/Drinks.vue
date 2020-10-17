<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Напитки
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="drink in drinks">
                        <th scope="row">{{ drink.id }}</th>
                        <td>
                            <router-link :to="'/drinks/' + drink.id" class="nav-a">{{ drink.name }}</router-link>
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
        drinks : {},

    }),
    created() {
        this.getDrinks()
    },
    methods: {
        getDrinks() {
            axios.get('/drinks/')
                .then(response => {
                    this.drinks = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
