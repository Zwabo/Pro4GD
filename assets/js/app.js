/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
import Vue from 'vue';
import App from './components/App';
import Routes from './routes.js';
import Axios from 'axios';
import { ProgressPlugin } from 'bootstrap-vue'
Vue.prototype.$http = Axios;
Vue.use(ProgressPlugin)

//CSS Imports
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../css/main.css';

new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App)
});

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

