<template lang="">
    <div>
        <div class='row'>
            <router-link to="/expens" class="btn btn-primary ml-3">All Expens</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Expens</h1>
                                    </div>
                                    <form class="user" @submit.prevent='ExpensInsert' enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <label for="">Expens Details</label>
                                                    <textarea class="form-control" id="" v-model='form.details'
                                                        rows="3"></textarea>
                                                    <small class="text-danger" v-if='errors.details'>
                                                        {{errors.details[0]}}</small> </small>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <label for="">Expens Amount</label>

                                                    <input type="text" class="form-control" v-model='form.amount' id=""
                                                        placeholder="Enter Expens Amount">
                                                    <small class="text-danger" v-if='errors.amount'>
                                                        {{errors.amount[0]}}</small> </small>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <label for="">Expens Date</label>

                                                    <input type="date" class="form-control" v-model='form.date' id=""
                                                        placeholder="Enter Expens Date">
                                                    <small class="text-danger" v-if='errors.date'>
                                                        {{errors.date[0]}}</small> </small>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Add Expens</button>
                                        </div>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        created() {
            if (!User.loggedIn()) {
                this.$router.push({
                    name: 'login'
                })
            }
        },
        data() {
            return {
                form: {
                    details: null,
                    amount: null,
                    date: null,

                },
                errors: {}
            }
        },
        methods: {

            ExpensInsert() {
                axios.post('/api/expens', this.form)
                    .then(() => {
                        this.$router.push({
                            name: 'expens'
                        })
                        notification.success()
                    })

                    .catch(err => {
                        this.errors = err.response.data.errors;
                        notification.error();
                    })
            }
        },
    }
</script>
<style lang="">

</style>
