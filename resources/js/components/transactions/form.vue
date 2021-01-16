<template>
    <form class="form" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="first_name" class="col-sm-3 col-form-label">
                Select a client
            </label>
            <div class="col-sm-9">
                <select name="client_id"
                    class="form-control"
                    v-model="transaction.client_id"
                    id="client_id">
                    <option value="">** Choose **</option>
                    <option v-for="client in clients"
                        :value="client.id"
                        :key="client.id">
                        {{ client.first_name }} {{ client.last_name }}
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="transaction_date" class="col-sm-3 col-form-label">
                Transaction date
            </label>
            <div class="col-sm-9">
                <input type="date"
                    class="form-control"
                    name="transaction_date"
                    id="transaction_date"
                    v-model="transaction.transaction_date"
                    required>
            </div>
        </div>

        <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">
                Amount
            </label>
            <div class="col-sm-9">
                <input type="number"
                    class="form-control-file"
                    name="amount"
                    min="1"
                    id="amount"
                    step="0.01"
                    v-model="transaction.amount"
                    required>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <button class="btn btn-primary btn-block"
                    @click.prevent="submit"
                    type="submit">
                    {{ isNew ? 'Submit' : 'Update'}}
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            isNew: {
                required: true,
                type: Boolean,
            },
            transactionData: {
                type: Object
            },
            clients: {
                type: Array,
                required: true
            },
        },

        data () {
            return {
                transaction: {
                    'client_id': '',
                    'transaction_date': '',
                    'amount': '',
                },
                loading: false
            }
        },

        created () {
            this.getTransactionData();
        },

        methods: {
            getTransactionData () {
                if (!_.isEmpty(this.transactionData)) {
                    Object.assign(this.transaction, this.transactionData);
                }
            },

            isLoading () {
                this.loading = true;
            },

            isDoneLoading () {
                this.loading = false;
            },

            submit () {
                this.isLoading();

                let data = this.transaction;

                this.isNew
                    ? this.create(data)
                    : this.update(data);
            },

            redirectToClients () {
                window.location = "/transactions";
            },

            create (data) {
                axios
                    .post('/api/transactions', data)
                    .then(response => {
                        alert('Client successfully created');

                        this.redirectToClients();

                        this.isDoneLoading();
                    })
                    .catch(error => {
                        console.log(error);
                        this.isDoneLoading();
                    })
            },

            update (data) {
                axios
                    .put(`/api/transactions/${this.transactionData.id}`, data)
                    .then(response => {
                        alert('Client successfully updated');

                        this.redirectToClients();

                        this.isDoneLoading();
                    })
                    .catch(error => {
                        console.log(error);
                        this.isDoneLoading();
                    })
            },
        },
    };
</script>
