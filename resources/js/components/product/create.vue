<template lang="">
    <div>
        <div class='row'>
            <router-link to="/product" class="btn btn-primary ml-3">All Product</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                    </div>
                                    <form class="user" @submit.prevent='ProductInsert' enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" v-model='form.product_name'>
                                                    <small class="text-danger" v-if='errors.product_name'>
                                                        {{errors.product_name[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Code</label>

                                                    <input type="text" class="form-control" v-model='form.product_code'>
                                                    <small class="text-danger" v-if='errors.product_code'>
                                                        {{errors.product_code[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label>Product Category</label>
                                                    <select v-model='form.cat_id' class="form-control">
                                                        <option :value="cat.id" v-for='cat in categories'>{{cat.name}}
                                                        </option>

                                                    </select>
                                                    <small class="text-danger" v-if='errors.cat_id'>
                                                        {{errors.cat_id[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Supplier</label>
                                                    <select v-model='form.supplier_id' class="form-control">
                                                        <option :value="supplier.id" v-for='supplier in suppliers'>
                                                            {{supplier.name}}</option>

                                                    </select>
                                                    <small class="text-danger" v-if='errors.supplier_id'>
                                                        {{errors.supplier_id[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <label>Product Root</label>
                                                    <input type="text" class="form-control" v-model='form.root'>
                                                    <small class="text-danger" v-if='errors.root'>
                                                        {{errors.root[0]}}</small> </small>
                                                </div>
                                                <div class="col-4">
                                                    <label>Buying Price</label>

                                                    <input type="text" class="form-control" v-model='form.buying_price'>
                                                    <small class="text-danger" v-if='errors.buying_price'>
                                                        {{errors.buying_price[0]}}</small> </small>
                                                </div>
                                                <div class="col-4">
                                                    <label>Selling Price Code</label>

                                                    <input type="text" class="form-control"
                                                        v-model='form.selling_price'>
                                                    <small class="text-danger" v-if='errors.selling_price'>
                                                        {{errors.selling_price[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label>Buying Date</label>
                                                    <input type="date" class="form-control" v-model='form.buying_date'>
                                                    <small class="text-danger" v-if='errors.buying_date'>
                                                        {{errors.buying_date[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Qty</label>

                                                    <input type="text" class="form-control" v-model='form.product_qty'>
                                                    <small class="text-danger" v-if='errors.product_qty'>
                                                        {{errors.product_qty[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <input type="file" @change='onFileSelect' class="custom-file-input"
                                                        id="customFile">
                                                    <small class="text-danger" v-if='errors.photo'>
                                                        {{errors.photo[0]}}</small> </small>
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="col-6">
                                                    <img :src="form.photo" width="40px" height="40px" alt="">

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
            axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data;

                })

            axios.get('/api/suppliers')
                .then(res => {
                    this.suppliers = res.data;

                })

        },
        data() {
            return {
                form: {
                    product_name: null,
                    cat_id: null,
                    product_code: null,
                    root: null,
                    buying_price: null,
                    selling_price: null,
                    supplier_id: null,
                    buying_date: null,
                    photo: null,
                    product_qty: null,

                },
                errors: {},
                categories: {},
                suppliers: {},
            }
        },
        methods: {
            onFileSelect(event) {
                let file = event.target.files[0];

                if (file.size > 1048770) {
                    notification.Image_size()
                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result
                        console.log(event.target.result);

                    };
                    reader.readAsDataURL(file);
                }
            },
            ProductInsert() {
                axios.post('/api/product', this.form)
                    .then(() => {
                        this.$router.push({
                            name: 'Product'
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
