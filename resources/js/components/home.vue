<template lang="">
    <div>


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today Sell Amount</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{totalSell}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today Income</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{income}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today Due</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{due}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today Expenses</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{expenses}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
          <!--Row-->
          <div class="row">
                            <div class="col-lg-12">

<div class="card">
                <div class="card-header py-3 d-flex   flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Stock Out List</h5>
      </div>
     <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Buying Price</th>
                        <th>Status</th>
                        <th>Product Quantity</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-for='data in products' :key="data.id" >
                        <td><img :src="data.image" class="img-fluid" width='40px' height='40px' /></td>
                        <td>{{data.product_name}}</td>
                        <td>{{data.product_code}}</td>
                        <td>{{data.buying_price}}</td>
                        <td>
                           <span v-if='data.product_qty>=1' class="badge badge-pill badge-success">Stock Available</span>
                           <span v-else='' class="badge badge-pill badge-danger">Stock Out</span>
                        </td>
                        <td>{{data.product_qty}}</td>

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
</template>
<script>
export default {
     created(){
        if(!User.loggedIn()){
           this.$router.push({name: 'login'})
        }
    },
    data() {
        return {
            totalSell: null,
            income: null,
            due: null,
            expenses: null,
            products: null,
        }
    },
    mounted() {
this.totalsell();
this.todayincome();
this.todayDue();
this.todayStock();
    },
    methods: {
        totalsell(){
            axios.get('/api/today/sell')
                .then(res => {
                    this.totalSell = res.data
                });
        },
        todayincome(){
            axios.get('/api/today/income')
                .then(res => {
                    this.income = res.data
                });
        },
        todayDue(){
            axios.get('/api/today/due')
                .then(res => {
                    this.due = res.data
                });
        },
        todayExp(){
            axios.get('/api/today/exp')
                .then(res => {
                    this.expenses = res.data
                });
        },
        todayStock(){
            axios.get('/api/today/stock')
                .then(res => {
                    this.products = res.data
                });
        }
    }

}
</script>
<style lang="">

</style>
