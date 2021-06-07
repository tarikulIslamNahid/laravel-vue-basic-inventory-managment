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
<router-link to="/salary" class="btn btn-primary ml-3">Salary</router-link>
                  <h5 class="m-0 font-weight-bold text-primary">Employee List</h5>
              <input type="text" class="form-control" v-model='searchItem' id="searchItems"
                                                    placeholder="Search Employee By Phone">
                </div>
     <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>

                        <th>Sallery Month</th>

                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for='data in filterSearch' :key="data.id" >
                        <td>{{data.salary_month}}</td>

                        <td>
<router-link :to="{name:'viewsalary', params:{id:data.salary_month}}" class="btn btn-sm   btn-primary">View Salary </router-link>

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
employees: [],
searchItem:'',
            }
        },
        methods: {
getEmp(){
    axios.get('/api/salary')
.then(res => {
    this.employees=res.data;
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
    return this.employees.filter(data=>{
        return data.salary_month.match(this.searchItem)
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
