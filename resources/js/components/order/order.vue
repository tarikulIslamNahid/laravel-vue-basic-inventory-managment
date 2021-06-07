<template lang="">
    <div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">

<div class="card">
                <div class="card-header py-3 d-flex   flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Today Order</h5>
              <input type="text" class="form-control" v-model='searchItem' id="searchItems"
                                                    placeholder="Search Expens By Details">
                </div>
     <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for='(data,index) in filterSearch' :key="index" >

                        <td>{{data.name}}</td>
                        <td>{{data.total}}</td>
                        <td>{{data.pay}}</td>
                        <td>{{data.due}}</td>
                        <td>{{data.pay_by}}</td>

                        <td>
                            <router-link :to="{name:'vieworder', params:{id:data.id}}" class="btn btn-sm btn-primary rounded-circle"> <i class="fas fa-eye"></i>  </router-link>

                        </td>
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
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        data() {
            return {
orders: [],
searchItem:'',
            }
        },
        methods: {
getOrders(){
    axios.get('/api/orders')
.then(res => {
    this.orders=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
        },
        computed: {
filterSearch(){
    return this.orders.filter(data=>{
        return data.name.match(this.searchItem )
    })
}
        },
       created() {
            if (!User.loggedIn()) {
                this.$router.push({
                    name: 'login'
                })
            };
             this.getOrders();

        },
    }
</script>

<style scoped>
#searchItems {
    width: 270px !important;
}
</style>
