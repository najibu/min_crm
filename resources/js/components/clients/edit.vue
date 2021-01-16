<<template>
    <div>
        <clients-create
            :isNew="false"
            :clientData="clientData"
        ></clients-create>
    </div>
</template>

<script>
    export default {
        props: {
            clientData: {
                type: Object
            }
        }
    };
</script>
