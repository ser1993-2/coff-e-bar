<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Кофе-бары
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="bar in bars">
                        <th scope="row">{{ bar.id }}</th>
                        <td>
                            <router-link :to="'/bars/' + bar.id" class="nav-a">{{ bar.name }}</router-link>
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
        bars : {},

    }),
    created() {
        this.getBars()
    },
    methods: {
        getBars() {
            axios.get('/bars')
                .then(response => {
                    this.bars = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
