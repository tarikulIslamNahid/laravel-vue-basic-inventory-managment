<template lang="">
    <div>
   <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" @submit.prevent='login'>
                    <div class="form-group">
                      <input type="email" class="form-control" v-model='form.email' id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                       <small class="text-danger" v-if='errors.email'> {{errors.email[0]}}</small> </small>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" v-model='form.password' id="exampleInputPassword" placeholder="Password">
                       <small class="text-danger" v-if='errors.password'> {{errors.password[0]}}</small> </small>

                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type='submit' class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>

                  </form>
                  <hr>
                  <div class="text-center">
                    <router-link class="font-weight-bold small" to="/register">Create an Account!</router-link>
                  </div>
                  <div class="text-center">
                    <!-- <router-link class="font-weight-bold small" to="/forget">Forgot your password ?</router-link> -->

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
    created(){
        if(User.loggedIn()){
           this.$router.push({name: 'dashboard'})
        }
    },
    data(){
         return{
form:{
    email:null,
    password:null,
},
errors:{}
     }
 },
 methods: {
     login(){
         axios.post('/api/auth/login',this.form)
         .then(res => {
           User.responseAfterLogin(res);
           Toast.fire({
            icon: 'success',
            title: 'Login successfully'
            })
           this.$router.push({name: 'dashboard'})
         })
         .catch(err => this.errors=err.response.data.errors)
         .catch(
             Toast.fire({
            icon: 'error',
            title: 'Invalid Email OR Password'
            })
         )
}
 },
}
</script>
<style lang="">

</style>
