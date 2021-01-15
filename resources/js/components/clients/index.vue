<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List of clients
                    </div>

                    <div class="card-body">
                        <div>
                            <a :href="createLink" class="text-primary mb-2">
                                Create a new client
                            </a>
                        </div>

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
                                        <th scope="row">
                                            <a :href="'/clients/' + client.id">
                                                {{ client.id }}
                                            </a>
                                        </th>
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
        props: {
            createLink: {
                required: true
            }
        },

        data() {
            return {
                clients: {},
            }
        },

        mounted() {
            this.getResults();
        },

    methods: {
        getResults(page = 1) {
            axios
                .get('/api/clients?page=' + page)
                .then(response => {
                    this.clients = response.data;
                });
        }
    }

    };
</script>
