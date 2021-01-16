<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Transaction Information
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <td class="col-xs-4">Client Name</td>
                                        <td>
                                            {{ transaction.client.first_name }} {{ transaction.client.last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-4">Transaction date</td>
                                        <td>{{ transaction.transaction_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td>£{{ transaction.amount }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            transaction: {
                required: true
            }
        }
    };
</script>
