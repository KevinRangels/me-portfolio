
require('./bootstrap');

window.Vue = require('vue');



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('app', require('./components/AppComponent.vue').default);
Vue.component('login-component', require('./components/LoginFormComponent.vue').default);

import router from './routes';

const app = new Vue({
    el: '#app',
    router
});
