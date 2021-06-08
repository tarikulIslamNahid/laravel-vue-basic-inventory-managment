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
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form class="user" @submit.prevent='signup'>
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" v-model='form.name' id="exampleInputFirstName" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" v-model='form.email' id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" v-model='form.password' id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" v-model='form.password_confirmation' id="exampleInputPasswordRepeat"
                        placeholder="Repeat Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                  </form>
                  <hr>
                  <div class="text-center">
                    <router-link class="font-weight-bold small" to="/">Already have an account?</router-link>
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
   created(){
        if(User.loggedIn()){
           this.$router.push({name: 'dashboard'})
        }
    },
        data(){
         return{
    form:{
        name:null,
        email:null,
        password:null,
        password_confirmation:null,
    },
    errors:{}
     }
 },
  methods: {
     signup(){
         axios.post('/api/auth/signup',this.form)
         .then(res => {
           User.responseAfterLogin(res);
           Toast.fire({
            icon: 'success',
            title: 'Register successfully'
            })
           this.$router.push({name: 'dashboard'})
         })
               .catch(err => {
   this.errors=err.response.data.errors
    Toast.fire({
            icon: 'error',
            title: 'Invalid Email OR Password'
            })
})
}
 },
}
</script>
<style lang="">

</style>
