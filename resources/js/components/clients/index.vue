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
                                        <th scope="col">Actions</th>
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
                                            <img :src="client.avatar"
                                                height="100"
                                                width="100">
                                        </td>
                                        <td>{{ client.email }}</td>
                                        <td>
                                            <a :href="editLink(client.id)"
                                                class="btn btn-primary">
                                                Edit
                                            </a>

                                            <button type="button"
                                                @click.prevent="destroy(client.id)"
                                                class="btn btn-danger">
                                                Delete
                                            </button>
                                        </td>
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
        },

        editLink (id) {
            return `/clients/${id}/edit`;
        },

        destroy (id) {
            axios
                .delete(`/api/clients/${id}`)
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        },
    }

    };
</script>
