// require ('./bootstrap')
//
// import Vue from 'vue'
// import App from './vue/app'
// import {library} from '@fortawesome/fontawesome-svg-core'
// import {faPlusSquare,faTrash} from "@fortawesome/free-solid-svg-icons";
// import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
// library.add(faPlusSquare,faTrash)
// Vue.component('font-awesome-icon',FontAwesomeIcon)
//
// const app = new Vue({
//     el: "#app",
//     components:{
//         App
//     }
// })



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueToast from 'vue-toast-notification';
import Popover from 'vue-js-popover'
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast)
Vue.use(Popover,{tooltip:true})
Vue.use(require('vue-moment'))
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('project-component', require('./components/ProjectComponent.vue').default);
Vue.component('lists-component',require('./project/ListsComponent').default);
Vue.component('index-component', require('./assets/IndexComponent.vue').default);
Vue.component('dashboard-component', require('./assets/DashboardComponent.vue').default);
Vue.component('assets-component', require('./assets/AssetsComponents.vue').default);
Vue.component('category-component', require('./assets/CategoryComponents.vue').default);
Vue.component('move-component', require('./assets/MoveAssetComponent.vue').default);
Vue.component('add-component', require('./assets/AddAssetComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
