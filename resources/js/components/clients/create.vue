<<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ isNew ? 'Create a new client' : 'Edit a client'}}
                        </h1>
                    </div>

                    <div class="card-body">
                        <clients-form
                            :isNew="isNew"
                        ></clients-form>
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
            }
        }
    };
</script>
