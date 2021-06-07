<template lang="">
    <div>
        <div class='row'>
            <router-link to="/orders" class="btn btn-primary ml-3">Go Back</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                                    </div>

                                    <div class="card shadow-sm my-5">
                                        <div class="card-body p-0">
                                            <div class="row mb-4">
                                                <div class="col-lg-6">

                                                    <div class="card">
                                                        <div
                                                            class="card-header py-3 d-flex   flex-row align-items-center justify-content-between">
                                                            <h5 class="m-0 font-weight-bold text-primary">Order Details</h5>
                                                            </h5>
                                                        </div>
                                                       <div class="table-responsive">
                                                 <ul class="list-group">
                                                     <li class="list-group-item"><b> Name: </b> {{orders.name}}</li> </li>
                                                     <li class="list-group-item"><b> Phone: </b> {{orders.phone}}</li> </li>
                                                     <li class="list-group-item"><b> Address: </b> {{orders.address}}</li> </li>
                                                     <li class="list-group-item"><b> Date: </b> {{orders.order_date}}</li> </li>
                                                     <li class="list-group-item"><b> Pay Though: </b> {{orders.pay_by}}</li> </li>
                                                 </ul>
                                             </div>
                                                    </div>
                                                    <div class="text-center">
                                                    </div>

                                                </div>



                                                <div class="col-lg-6">

                                                    <div class="card">
                                                        <div
                                                            class="card-header py-3 d-flex   flex-row align-items-center justify-content-between">
                                                            <h5 class="m-0 font-weight-bold text-primary">Category List
                                                            </h5>
                                                        </div>
                                             <div class="table-responsive">
                                                 <ul class="list-group">
                                                       <li class="list-group-item"><b> Sub Total: </b> {{orders.sub_total}}</li> </li>
                                                     <li class="list-group-item"><b> Vat: </b> {{orders.vat}} %</li> </li>
                                                     <li class="list-group-item"><b> Total: </b> {{orders.total}}</li> </li>
                                                     <li class="list-group-item"><b> Pay Amount: </b> {{orders.pay}}</li> </li>
                                                     <li class="list-group-item"><b> Due Amount: </b> {{orders.due}}</li> </li>
                                                 </ul>
                                             </div>
                                                    </div>
                                                    <div class="text-center">
                                                    </div>

                                                </div>


                                            </div>




                                            <div class="row pt-4" >
                                                <div class="col-lg-12">

                                                    <div class="card">
                                                        <div
                                                            class="card-header py-3 d-flex   flex-row align-items-center justify-content-between">
                                                            <h5 class="m-0 font-weight-bold text-primary">Product Details
                                                            </h5>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Image</th>
                                                                        <th>Product Name</th>
                                                                        <th>Product Code</th>
                                                                        <th>Qty</th>
                                                                        <th>Unit Price</th>
                                                                        <th>Total Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for='(data,index) in details'
                                                                        :key="index">
                        <td><img :src="data.image" class="img-fluid" width='40px' height='40px' /></td>

                                                                        <td>{{data.product_name}}</td>
                                                                        <td>{{data.product_code}}</td>
                                                                        <td>{{data.pro_qty}}</td>
                                                                        <td>{{data.pro_price}}</td>
                                                                        <td>{{data.sub_total}}</td>

                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                    </div>

                                                </div>
                                            </div>





                                        </div>
                                    </div>

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
            axios.get('/api/orders/details/' + id)
                .then(res => {
                    this.orders = res.data
                });

            axios.get('/api/orders/orderdetails/' + id)
            .then(res => {
                this.details = res.data
            });

        },
        data() {
            return {

            orders:{},
            details:[],
                errors: {}
            }
        },
        methods: {


        },
    }
</script>
<style lang="">

</style>
