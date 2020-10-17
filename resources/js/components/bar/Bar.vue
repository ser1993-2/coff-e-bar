<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Кофе-бар: {{ bar.name }}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">

                <div class="alert alert-primary" role="alert">
                    <p>Выбрать напиток:</p>
                    <select class="form-control">
                        <option v-for="drink in drinks" :value="drink.id" v-on:click="getDrink(drink.id)">{{ drink.name }}</option>
                    </select>

                    <br/>
                    <table class="table" v-if="drinkRecipe.length > 0">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Значение</th>
                            <th scope="col">Наличие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in drinkRecipe">
                            <td>{{ item.name }}</td>
                            <td>{{ item.value }} <b> {{ item.description }}</b></td>
                            <td>
                                <p v-if="item.is_active" style="color: green">В наличие</p>
                                <p v-if="!item.is_active" style="color: red">Недостаточно</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" v-if="isButton" v-on:click="buy()">Подтвердить заказ</button>
                </div>

            </div>
            <div class="col-6">

                <div class="alert alert-primary" role="alert">
                    Наличие на складе: <router-link :to="'/storages/' + storage.id" class="nav-a">{{storage.name}}</router-link>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Остаток</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="consumable in storageConsumables">
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
        barId: 0,
        bar : {},
        drinkId: 0,
        drinks: {},
        drinkRecipe: {},
        storage: {},
        storageConsumables: {},
        isButton: false,

    }),
    created() {
        this.barId = this.$route.params.id;
        this.getBar();
        this.getDrinks();
    },
    methods: {
        getBar() {
            axios.get('/bars/' + this.barId)
                .then(response => {
                    this.bar = response.data;
                    this.getStorage();
                });
        },
        getDrinks() {
            axios.get('/drinks/')
                .then(response => {
                    this.drinks = response.data
                });
        },
        getDrink(id) {

            this.drinkId = id;

            axios.get('/drinks/' + id)
                .then(response => {
                    this.drinkRecipe = response.data;
                    this.drinkBuild();
                });
        },
        getStorage() {
            axios.get('/storages/bar/' + this.bar.id)
                .then(response => {
                    this.storage = response.data;
                    this.getConsumables();
                });
        },
        getConsumables() {
            axios.get('/consumables/storage/' + this.storage.id)
                .then(response => {
                    this.storageConsumables = response.data
                });
        },
        drinkBuild() {
            for (let itemRecept in this.drinkRecipe) {
                for (let itemConsumable in this.storageConsumables) {
                    this.drinkRecipe[itemRecept].is_active = false;

                    if (this.drinkRecipe[itemRecept].consumables_id === this.storageConsumables[itemConsumable].consumables_id) {
                        if (this.drinkRecipe[itemRecept].value <= this.storageConsumables[itemConsumable].value) {
                            this.drinkRecipe[itemRecept].is_active = true;
                            break;
                        }
                    }

                }
            }
            this.buttonActive();
        },
        buttonActive() {
            this.isButton = false;

            for (let itemRecept in this.drinkRecipe) {
                this.isButton = this.drinkRecipe[itemRecept].is_active;

                if ( this.isButton === false) {
                    break;
                }
            }
        },
        buy() {

            let data = {
                'bars_id': this.barId,
                'storage_id': this.storage.id,
                'drink_id': this.drinkId
            }

            axios.post('/audit/', data)
                .then(response => {
                    this.getBar();
                    this.getDrinks();
                });
        },
    },
}
</script>

<style scoped>

</style>
