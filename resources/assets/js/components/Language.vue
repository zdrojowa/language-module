<template>
    <div>
        <b-form @submit="save">
            <b-card header-tag="header">
                <template #header>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </template>
                <b-card-text>
                    <b-row>
                        <b-col>
                            <b-form-group
                                label="Nazwa"
                            >
                                <b-form-input
                                    v-model="name"
                                    type="text"
                                    placeholder="Wpisz nazwę"
                                    required
                                ></b-form-input>
                            </b-form-group>
                        </b-col>
                        <b-col>
                          <b-form-group
                              label="Prefiks"
                              description="Krótki prefiks np. pl, en"
                          >
                            <b-form-input
                                v-model="short_name"
                                type="text"
                                placeholder="Wpisz prefiks"
                                :state="nameState"
                                required
                            ></b-form-input>
                          </b-form-group>
                        </b-col>
                    </b-row>
                </b-card-text>
            </b-card>
        </b-form>
    </div>
</template>

<script>
    export default {
        props : ['csrf', 'route', 'language', 'checkKeyRoute'],

        data() {
            return {
                name: '',
                short_name: '',
                nameState: null
            }
        },

        created() {
            if (this.language) {
                this.name       = this.language.name
                this.short_name = this.language.short_name
            }
        },

        methods: {
            save(e) {
                e.preventDefault()
                if (this.nameState) {
                    let formData = new FormData()
                    formData.append('_method', this.language ? 'PUT' : 'POST')
                    formData.append('name', this.name)
                    formData.append('short_name', this.short_name)

                    axios.post(this.route, formData, {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf
                        }
                    })
                    .then(res => {
                        window.location = res.data.redirect
                    }).catch(err => {
                        console.log(err);
                    });
                } else {
                    return false;
                }
            },

            checkKeyUnique() {
                let route = this.checkKeyRoute + '?key=' + this.short_name
                if (this.language) {
                    route += '&id=' + this.language.id
                }
                axios.get(route)
                .then(res => {
                    this.nameState = !!res.data
                }).catch(err => {
                    console.log(err)
                })
            }
        },

        watch: {
            short_name() {
                if (!this.short_name.length) {
                    this.nameState = false
                } else {
                    this.checkKeyUnique()
                }
            }
        }
    }
</script>
