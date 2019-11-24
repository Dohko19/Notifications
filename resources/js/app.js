
require('./bootstrap');

window.Vue = require('vue');

Vue.component('notifications', require('./components/Notifications.vue').default);


const app = new Vue({
    el: '#app',
});
