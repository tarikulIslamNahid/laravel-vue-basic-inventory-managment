<template lang="">
    <div>


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>

          <div class="row mb-3">


            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
<a class="btn btn-primary text-white" href="#" > Add Customer </a>
                </div>
                <div class="card-body">

<div class="card">

     <div class="table-responsive">
                  <table class="table align-items-center table-flush" style="font-size:12px">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for='cart in carts'>

                        <td>{{cart.pro_name}}</td>
                        <td class='d-flex px-0'>
                            <button @click.prevent="inc(cart.id)" class="btn btn-success btn-sm p-o mr-1">+</button>
                            <input type="text" style="width:20px;border:none" readonly :value="cart.pro_qty">
                            <button @click.prevent="dec(cart.id)" v-if='cart.pro_qty!=1' class="btn btn-danger btn-sm p-o">-</button>
                            <button v-else='' disabled class="btn btn-danger btn-sm p-o">-</button>
                             </td>
                        <td>{{cart.pro_price}}</td>
                        <td>{{cart.sub_total}}</td>

                        <td>

                            <a href='javascript:void(0)' @click='removeItem(cart.id)' class="btn btn-sm btn-danger">X </a>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>

<div class="card-footer">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
            <strong>{{totalCart}}</strong>
        </li>
           <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
            <strong>{{totalSub}}</strong>
        </li>
           <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
            <strong > ({{(totalSub*vats.vat)/100}} ৳) {{vats.vat}} %</strong>
        </li>
           <li class="list-group-item d-flex justify-content-between align-items-center">Total:
            <strong>{{(totalSub*vats.vat)/100 + totalSub}}</strong>
        </li>
    </ul>
    <br>
    <form @submit.prevent='orderdone'>
        <label class='mb-2'>Customer Name</label>
           <select class='form-control' v-model='customer_id' >
            <option v-for='customer in Customers' :value="customer.id">{{customer.name}}</option>
        </select>
        <label class='mb-2'>Pay</label>
<input class='form-control' type='text' v-model='pay'>

        <label class='mb-2'>Due</label>
<input class='form-control' type='text' v-model='due'>
        <label class='mb-2'>Pay By</label>
        <select class='form-control' v-model='pay_by'>
            <option value="HandCash">Hand Cash</option>
            <option value="chaque">Chaque</option>
            <option value="GiftCard">Guft Card</option>
        </select>
<button class='btn btn-primary mt-3' type='submit'>Submit</button>
    </form>
</div>

                </div>


                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>

                </div>
                <div class="card-body">
                    <!-- tabs -->
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
  </li>
  <li class="nav-item" v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" @click="getCatProduct(category.id)" href="#products" role="tab" aria-controls="profile" aria-selected="false">{{category.name}}</a>
  </li>

</ul>

                    <!-- tabs -->

 <div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
   <input type="text" class="form-control w-100 mb-3 ml-2" v-model='searchItem' id="searchItems"
                                                    placeholder="Search Product By Name">

     <div class="row">

      <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filterSearch" :key="product.id">
             <button class="btn btn-sm" @click.prevent="AddToCart(product.id)">
             <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
              <img :src="product.image" id="em_photo" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title">{{ product.product_name }}</h6>
       <span class="badge badge-success" v-if="product.product_qty  >= 1 ">Available {{ product.product_qty }}  </span>
    <span class="badge badge-danger" v-else=" ">Stock Out </span>

              </div>
            </div></button>

        </div>
      </div>
  </div>



  <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="profile-tab">
        <input type="text" class="form-control w-100 mb-3 ml-2" v-model='searchItem' id="searchItems"
                                                    placeholder="Search Product By Name">

 <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

     <div class="row">

      <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="catproduct in catfilterSearch" :key="catproduct.id">
             <button class="btn btn-sm" @click.prevent="AddToCart(catproduct.id)">
             <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
              <img :src="catproduct.image" id="em_photo" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title">{{ catproduct.product_name }}</h6>
       <span class="badge badge-success" v-if="catproduct.product_qty  >= 1 ">Available {{ catproduct.product_qty }}  </span>
    <span class="badge badge-danger" v-else=" ">Stock Out </span>

              </div>
            </div></button>

        </div>
      </div>
  </div>
  </div>

  </div>

</div>

                </div>

              </div>
            </div>

          </div>
          <!--Row-->


    </div>
</template>
<script>
    export default {

        data() {
            return {
suppliers: [],
categories: [],
CatProduct: [],
Customers: [],
carts: [],
customer_id:'',
pay:null,
due:null,
pay_by:null,
searchItem:'',
vats:[],
            }
        },
        methods: {
            orderdone(){
let total= (this.totalSub*this.vats.vat)/100 + this.totalSub;
let data= {
    qty: this.totalCart,
    subtotal: this.totalSub,
    customer_id:this.customer_id,
    pay_by:this.pay_by,
    pay:this.pay,
    due:this.due,
    vat:this.vats.vat,
    total:total
};
 axios.post('/api/orderdone',data)
         .then( () => {
             this.$router.push({name: 'pos'});
             this.getCarts();
             this.getEmp();
this.due='';
this.customer_id='';
this.pay='';
this.pay_by='';
          notification.success()
         })

          .catch(err => {
              this.errors=err.response.data.errors;
       notification.error();
    })
            },
            extra(){
    axios.get('/api/vats')
.then(res => {
    this.vats=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
            AddToCart(id){
                axios.get('/api/addCart/'+id)
            .then(res => {
            notification.customNoti(res.data);
             this.getCarts();

            })
            },
            inc(id){
    axios.get('/api/cart/cartInc/'+id)
            .then(() => {
                    notification.cartSuccess();
             this.getCarts();

            })
            },
                dec(id){
    axios.get('/api/cart/cartDec/'+id)
            .then(() => {
                    notification.cartSuccess();
             this.getCarts();

            })
            },
            removeItem(id){

axios.get("/api/cart/remove/"+id)
.then(() => {
     this.carts=this.carts.filter(data=>{
         return data.id != id
     })
       notification.cartDelete();

})


            },
getCarts(){
    axios.get('/api/carts/get')
.then(res => {
    this.carts=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
            getCustomer(){
    axios.get('/api/customer')
.then(res => {
    this.Customers=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
getEmp(){
    axios.get('/api/product')
.then(res => {
    this.suppliers=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
getCat(){
    axios.get('/api/categories')
.then(res => {
    this.categories=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
getCatProduct(id){

        axios.get('/api/getproductcategoy/'+id)
            .then(res => {
               this.CatProduct = res.data;
            })
            .catch(err => {
                console.error(err);
            })
}

        },
        computed: {
filterSearch(){
    return this.suppliers.filter(data=>{
        return data.product_name.match(this.searchItem)
    })
},
totalCart(){
         let sum = 0;
        for(let i=0; i<this.carts.length; i++ ){
            sum += (parseFloat(this.carts[i].pro_qty));
        }
            return sum;
},
totalSub(){
         let subsum = 0;
        for(let i=0; i<this.carts.length; i++ ){
            // subsum += (parseFloat(this.carts[i].sub_total));
            subsum += (parseFloat(this.carts[i].pro_qty) * parseFloat(this.carts[i].pro_price) );
        }
            return subsum;
},
catfilterSearch(){
    return this.CatProduct.filter(data=>{
        return data.product_name.match(this.searchItem)
    })
}
        },
       created() {
            if (!User.loggedIn()) {
                this.$router.push({
                    name: 'login'
                })
            };
             this.getEmp();
             this.getCat();
             this.getCustomer();
             this.getCarts();
             this.extra();

        },
    }
</script>

<style scoped>

img#em_photo {
    width: 120px !important;
    height: 120px !important;
    object-fit: contain;
    margin-top: 5px;
}
h6.card-title {
    font-size: 12px !important;
}
</style>
