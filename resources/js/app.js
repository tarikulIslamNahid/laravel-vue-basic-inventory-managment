

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import {routes} from './routes'

// import user class
import User from './Helpers/User';
window.User = User;

//import sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
window.Toast = Toast;

//import sweet alert

//import notification
import notification from './Helpers/notification';
window.notification = notification;


const router = new VueRouter({
    routes,
    mode: 'history'
})
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',router
});
