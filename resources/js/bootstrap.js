window._ = require('lodash');

window.Noty = require('noty');
try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js').default;

    require('bootstrap');
} catch (e) {}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
