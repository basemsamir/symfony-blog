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
import VueRouter from 'vue-router';
import VueTimeago from 'vue-timeago';
import Routes from "./router/index";
import AppComponent from "./components/AppComponent";


Vue.use(VueRouter);
Vue.use(VueTimeago, {
    name: 'Timeago', // Component name, `Timeago` by default
    locale: 'en', // Default locale
})

const routes = new VueRouter(
    {routes: Routes}
)

new Vue({
    el: '#blog',
    components: {AppComponent: AppComponent},
    router: routes
})