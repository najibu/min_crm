<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List of transactions
                    </div>

                    <div class="card-body">
                        <div>
                            <a :href="createLink" class="text-primary mb-2">
                                Create a new transaction
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Transaction date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="transaction in transactions.data">
                                        <th scope="row">
                                            <a :href="'/transactions/' + transaction.id">
                                                {{ transaction.id }}
                                            </a>
                                        </th>
                                        <td>
                                            {{ transaction.client.first_name }} {{ transaction.client.last_name }}
                                        </td>
                                        <td>
                                            {{ transaction.transaction_date }}
                                        </td>
                                        <td>£{{ transaction.amount }}</td>
                                        <td>
                                            <a :href="editLink(transaction.id)"
                                                class="btn btn-primary">
                                                Edit
                                            </a>

                                            <button type="button"
                                                @click.prevent="destroy(transaction.id)"
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

                <pagination :data="transactions" @pagination-change-page="getResults"></pagination>
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
                transactions: {},
            }
        },

        mounted() {
            this.getResults();
        },

    methods: {
        getResults(page = 1) {
            axios
                .get('/api/transactions?page=' + page)
                .then(response => {
                    this.transactions = response.data;
                });
        },

        editLink (id) {
            return `/transactions/${id}/edit`;
        },

        destroy (id) {
            axios
                .delete(`/api/transactions/${id}`)
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
