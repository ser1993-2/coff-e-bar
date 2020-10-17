<template>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    Логирование
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Заведение</th>
                        <th scope="col">Напиток</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="audit in audits">
                        <th scope="row">{{ audit.id }}</th>
                        <td>{{ audit.bar_name }}</td>
                        <td>{{ audit.drink_name }}</td>
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
        audits : {},

    }),
    created() {
        this.getAudit()
    },
    methods: {
        getAudit() {
            axios.get('/audit/')
                .then(response => {
                    this.audits = response.data
                });
        },
    },
}
</script>

<style scoped>

</style>
