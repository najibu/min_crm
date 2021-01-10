<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Clients
                    </div>

                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="client in clients.data">
                                        <th scope="row">{{ client.id }}</th>
                                        <td>{{ client.first_name }}</td>
                                        <td>{{ client.last_name }}</td>
                                        <td>
                                            <img :src="client.avatar" height="32" width="32">
                                        </td>
                                        <td>{{ client.email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <pagination :data="clients" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                // Our data object that holds the Laravel paginator data
                clients: {},
            }
        },

        mounted() {
            // Fetch initial results
            this.getResults();
        },

    methods: {
        // Our method to GET results from a Laravel endpoint
        getResults(page = 1) {
            axios.get('api/clients?page=' + page)
                .then(response => {
                    this.clients = response.data;
                });
        }
    }

    };
</script>
