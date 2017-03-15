var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.use(require('vue-validator'));
var moment  = require('moment');
//-------------------------------------------------------------------------------------------------
Vue.filter('formatDate', function(value, formatString) {
    if (formatString != undefined) {
        return moment(value).format(formatString);
    }
    return moment(value).format('DD/MMM/YYYY');
});
//-------------------------------------------------------------------------------------------------
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
    el: '.front_page',

    data: {
    },

    components: {
        //------------------------------Product-----------------------------------
        'show-product-in-front': require('./components/Products/ShowProduct'),
        //------------------------------Promotion-----------------------------------
        'show-promotion-in-front': require('./components/Promotions/ShowPromotion'),
        // ------------------------------place-----------------------------------
    }
});
