require('./bootstrap');

window.Vue = require('vue');

Vue.component('distance', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',

});
