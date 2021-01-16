<<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ isNew ? 'Create a new transaction' : 'Edit a transaction'}}
                        </h1>
                    </div>

                    <div class="card-body">
                        <transactions-form
                            :isNew="isNew"
                            :transactionData="transactionData"
                            :clients="clients"
                        ></transactions-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            isNew: {
                default: true
            },
            transactionData: {
                type: Object
            },
            clients: {
                type: Array,
                required: true
            },
        }
    };
</script>
