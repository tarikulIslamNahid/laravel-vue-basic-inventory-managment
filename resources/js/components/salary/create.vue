<template lang="">
    <div>
    <div class='row'>
<router-link to="/salary/pay" class="btn btn-primary ml-3">Pay Salary</router-link>
    </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pay Salary</h1>
                                    </div>
                                    <form class="user" @submit.prevent='paySalary'>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label>Employee Name</label>

                                                    <input type="text" class="form-control" v-model='form.name' id=""
                                                        placeholder="Enter Full Name">
                                                         <small class="text-danger" v-if='errors.name'> {{errors.name[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <label>Employee Email</label>

                                                    <input type="email" class="form-control" v-model='form.email' id=""
                                                        placeholder="Enter Employee Email">
                                                         <small class="text-danger" v-if='errors.email'> {{errors.email[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label>Month</label>
                             <select v-model='form.salary_month' class="form-control">
                   <option value="January"> January </option>
                   <option value="February"> February </option>
                   <option value="March"> March </option>
                   <option value="April"> April </option>
                   <option value="May"> May </option>
                   <option value="June"> June </option>
                   <option value="July"> July </option>
                   <option value="August"> August </option>
                   <option value="September"> September </option>
                   <option value="October"> October </option>
                   <option value="November"> November </option>
                   <option value="December"> December </option>

                                                    </select>
                                                         <small class="text-danger" v-if='errors.salary_month'> {{errors.salary_month[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <label>Employee Salary</label>

                                                    <input type="text" class="form-control" v-model='form.sallery' id=""
                                                        placeholder="Enter Employee Sallery">
                                                         <small class="text-danger" v-if='errors.sallery'> {{errors.sallery[0]}}</small> </small>
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
            axios.get('/api/employee/'+id)
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
                    name: null,
                    email: null,
                    salary_month:null,
                    sallery:null,

                },
                errors: {}
            }
        },
        methods: {

paySalary(){
    let id = this.$route.params.id
 axios.post('/api/salary/paid/'+id,this.form)
         .then( res => {

             this.$router.push({name: 'salary'})
        notification.customNoti(res.data);

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
