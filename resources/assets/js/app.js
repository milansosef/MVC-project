
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// TODO: Use this or not?
window.Vue = require('vue');
import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


/**
 * Function to submit the state button without a submit button
 */
$(function() {

        $(".toggle-event").change(function()
        {
            $(this).parents("form").submit();
        });
});

