<<template>
    <div>
        <transactions-create
            :isNew="false"
            :transactionData="transactionData"
            :clients="clients"
        ></transactions-create>
    </div>
</template>

<script>
    export default {
        props: {
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
