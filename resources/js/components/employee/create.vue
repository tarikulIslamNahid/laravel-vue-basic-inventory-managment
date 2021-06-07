<template lang="">
    <div>
    <div class='row'>
<router-link to="/employees" class="btn btn-primary ml-3">All Employee</router-link>
    </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
                                    </div>
                                    <form class="user" @submit.prevent='employeeInsert' enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" v-model='form.name' id=""
                                                        placeholder="Enter Full Name">
                                                         <small class="text-danger" v-if='errors.name'> {{errors.name[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <input type="email" class="form-control" v-model='form.email' id=""
                                                        placeholder="Enter Employee Email">
                                                         <small class="text-danger" v-if='errors.email'> {{errors.email[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" v-model='form.address' id=""
                                                        placeholder="Enter Employee Address">
                                                         <small class="text-danger" v-if='errors.address'> {{errors.address[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" v-model='form.sallery' id=""
                                                        placeholder="Enter Employee Sallery">
                                                         <small class="text-danger" v-if='errors.sallery'> {{errors.sallery[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <input type="date" class="form-control" v-model='form.join_date'
                                                        id="">
                                                         <small class="text-danger" v-if='errors.join_date'> {{errors.join_date[0]}}</small> </small>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" v-model='form.nid' id=""
                                                        placeholder="Enter Employee NID">
                                                         <small class="text-danger" v-if='errors.nid'> {{errors.nid[0]}}</small> </small>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="form-row">

                                            <div class="col-12">
                                                <input type="text" class="form-control" v-model='form.phone' id=""
                                                    placeholder="Enter Employee Number">
                                                     <small class="text-danger" v-if='errors.phone'> {{errors.phone[0]}}</small> </small>
                                            </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                  <input type="file" @change='onFileSelect' class="custom-file-input" id="customFile">
                                                   <small class="text-danger" v-if='errors.photo'> {{errors.photo[0]}}</small> </small>
                        <label class="custom-file-label" for="customFile">Choose file</label>
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
            }
        },
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    address:null,
                    sallery:null,
                    join_date:null,
                    nid:null,
                    phone:null,
                    photo:null,

                },
                errors: {}
            }
        },
        methods: {
            onFileSelect(event){
                let file=event.target.files[0];

                if(file.size> 1048770){
notification.Image_size()
                }else{
          let reader=new FileReader();
          reader.onload=event=>{
              this.form.photo=event.target.result
              console.log(event.target.result);

          };
          reader.readAsDataURL(file);
                }
            },
employeeInsert(){
 axios.post('/api/employee',this.form)
         .then( () => {
             this.$router.push({name: 'employees'})
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
