require('./bootstrap');

import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/en'

Vue.use(ElementUI, {locale});
Vue.component('SearchComponent', require('./components/SearchComponent.vue').default);

let app = new Vue({
    el: '#app',
})
