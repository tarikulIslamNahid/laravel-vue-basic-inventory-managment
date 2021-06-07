<template lang="">
    <div>
    <div class='row'>
<router-link to="/product/stock" class="btn btn-primary ml-3">Go Back</router-link>
    </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update Product Stock</h1>
                                    </div>
                                    <form class="user" @submit.prevent='ProductUpdate'>

                                        <div class="form-group">
                                            <div class="form-row">

                                                <div class="col-12">
                                                    <label>Product Stock</label>

                                                    <input type="text" class="form-control" v-model='form.product_qty'>
                                                    <small class="text-danger" v-if='errors.product_qty'>
                                                        {{errors.product_qty[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
            };
            let id = this.$route.params.id
            axios.get('/api/product/'+id)
            .then(res => {
               this.form = res.data
            })
            .catch(err => {
                console.error(err);
            })



        },
        data() {
           return {
                form: {

                    product_qty: null,

                },
                errors: {},
            }
        },
        methods: {

ProductUpdate(){
    let id = this.$route.params.id
 axios.post('/api/stock/update/'+id,this.form)
         .then( () => {

             this.$router.push({name: 'stock'})
          notification.success()
         })

          .catch(err => {
              this.errors=err.response.data.errors;
       notification.error();
    })
}
        },
    }
</script>
<style lang="">

</style>
