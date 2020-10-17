<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Напиток: {{ drink.name }}
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
                            <th scope="col">Значение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="recipe in recipes">
                            <td>{{ recipe.name }}</td>
                            <td>{{ recipe.value }} <b> {{ recipe.description }}</b></td>
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
        drinkId: 0,
        drink : {},
        recipes: {},

    }),
    created() {
        this.drinkId = this.$route.params.id;
        this.getDrink();
        this.getRecipe();
    },
    methods: {
        getDrink() {
            axios.get('/drinks/' + this.drinkId)
                .then(response => {
                    this.drink = response.data
                });
        },
        getRecipe() {
            axios.get('/drinks/recipe/' + this.drinkId)
                .then(response => {
                    this.recipes = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
