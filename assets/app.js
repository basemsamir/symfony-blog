/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

// start using vueJS
import Vue from 'vue';
import HomeComponent from "./components/HomeComponent";

// Vue filters
import VueTimeago from 'vue-timeago';

Vue.use(VueTimeago, {
    name: 'Timeago', // Component name, `Timeago` by default
    locale: 'en', // Default locale
})

new Vue({
    el: '#blog',
    components: {HomeComponent: HomeComponent}
})