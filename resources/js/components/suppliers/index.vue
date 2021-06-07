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
<router-link to="/supplier/create" class="btn btn-primary ml-3">Add Supplier</router-link>
                  <h5 class="m-0 font-weight-bold text-primary">Supplier List</h5>
              <input type="text" class="form-control" v-model='searchItem' id="searchItems"
                                                    placeholder="Search Supplier By Phone">
                </div>
     <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Shop Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for='data in filterSearch' :key="data.id" >

                        <td><img :src="data.photo" class="img-fluid" width='40px' height='40px' /></td>
                        <td>{{data.name}}</td>
                        <td>{{data.shopname}}</td>
                        <td>{{data.phone}}</td>

                        <td>
                            <router-link :to="{name:'suppliersedit', params:{id:data.id}}" class="btn btn-sm   btn-primary">Edit </router-link>
                            <a href='javascript:void(0)' @click='deleteSup(data.id)' class="btn btn-sm   btn-danger">Delete </a>
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
suppliers: [],
searchItem:'',
            }
        },
        methods: {
getEmp(){
    axios.get('/api/suppliers')
.then(res => {
    this.suppliers=res.data;
    // console.log(res.data)
})
.catch(err => {
    // console.error(err);
       notification.error();

})
},
deleteSup(id){

Swal.fire({
  title: 'Are you sure?',
//   text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {


axios.delete("/api/suppliers/"+id)
.then(() => {
     this.suppliers=this.suppliers.filter(data=>{
         return data.id != id
     })
})
.catch(() => {
   this.$router.push({ name:'suppliers'})
})
     Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
}
        },
        computed: {
filterSearch(){
    return this.suppliers.filter(data=>{
        return data.phone.match(this.searchItem)
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

        },
    }
</script>

<style scoped>
#searchItems {
    width: 270px !important;
}
</style>
