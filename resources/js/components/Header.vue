<template>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <router-link to="/bars" class="navbar-brand nav-a">Кофе-бары</router-link>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link to="/storages" class="nav-a">Склады</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/drinks" class="nav-a">Напитки</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/consumables" class="nav-a">Расходники</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/audit" class="nav-a">Аудит</router-link>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <br/>
    </div>

</template>

<script>
export default {
    data: () => ({
    }),
    created() {
    },
    methods: {

    },
}
</script>

<style scoped>

.nav-a {
    margin-right: 15px;
    color: black;
}

.nav-a:hover {
    color: #3b3838;
    text-decoration: none;
}

</style>
