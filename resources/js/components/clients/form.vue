<template>
    <form class="form" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">
                First Name
            </label>
            <div class="col-sm-10">
                <input type="text"
                    class="form-control"
                    name="first_name"
                    id="first_name"
                    v-model="client.first_name"
                    required>
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">
                Last Name
            </label>
            <div class="col-sm-10">
                <input type="text"
                    class="form-control"
                    name="last_name"
                    id="last_name"
                    v-model="client.last_name"
                    required>
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-sm-2 col-form-label">
                Avatar
            </label>
            <div class="col-sm-10">
                <input type="file"
                    class="form-control-file"
                    name="avatar"
                    id="avatar"
                    accept="image/jpeg, image/png"
                    @change="selectedAvatar"
                    required>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">
                Email
            </label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    v-model="client.email"
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
            clientData: {
                type: Object
            },
        },

        data () {
            return {
                client: {
                    'first_name': 'Najibu',
                    'last_name': 'Nsubuga',
                    'avatar': '',
                    'email': 'na@example.com'
                },
                loading: false
            }
        },

        created () {
            this.getClientData();
        },

        methods: {
            selectedAvatar (event) {
                this.client.avatar = event.target.files[0];
            },

            getClientData () {
                if (!_.isEmpty(this.clientData)) {
                    Object.assign(this.client, this.clientData);
                }
            },

            formData (client) {
              let form = new FormData();

              form.append("first_name", client.first_name);
              form.append("last_name", client.last_name);
              form.append("avatar", client.avatar);
              form.append("email", client.email);

              return form;
            },

            isLoading () {
                this.loading = true;
            },

            isDoneLoading () {
                this.loading = false;
            },

            submit () {
                this.isLoading();

                let data = this.formData(this.client);

                this.isNew
                    ? this.create(data)
                    : this.update(data);
            },

            redirectToClients () {
                window.location = "/clients";
            },

            create (data) {
                axios
                    .post('/api/clients', data)
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
                    .put(`/api/clients/${this.clientData.id}`, data)
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
