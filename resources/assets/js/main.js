var Vue = require('vue');
Vue.use(require('vue-validator'));
Vue.use(require('vue-resource'));
var moment  = require('moment');

Vue.filter('formatDate', function(value, formatString) {
    if (formatString != undefined) {
        return moment(value).format(formatString);
    }
    return moment(value).format('DD/MMM/YYYY');
});


//
// Vue.directive('mask', function (maskval) {
//     $(this.el).mask(maskval);
// });

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
    el: '.sagmma_container',

    data: {
        profile      : {
            state: '',
            council: '',
            parish: '',
        },
        updateimage  : '',
        employeeExcel: '',
    },

    ready() {
        jQuery(function($){
            $.mask.definitions['c']='[295]';
            $("#phone").mask("(+238) c99-99-99",{placeholder:"_"});
            $("#phoneed").mask("(+238) c99-99-99",{placeholder:"_"});
            $("#ic").mask("999999",{placeholder:"_"});
            $("#iced").mask("999999",{placeholder:"_"});
        });
    },



    components: {
        //-----------------------------users--------------------------------------
        'show-users': require('./components/Users/ShowUsers'),
        'create-user': require('./components/Users/CreateUser'),
        // ------------------------------------------------------------------------
        'show-role': require('./components/Roles/showRoles'),
        'show-permission': require('./components/Permissions/showPermission'),
        //------------------------------Markets-----------------------------------
        'show-market': require('./components/Markets/ShowMarket'),
        //------------------------------Employee Type-----------------------------------
        'show-typeofemployee': require('./components/Typeofemployee/ShowTypeofemployee'),
        //------------------------------place Type-----------------------------------
        'show-typeofplace': require('./components/Typeofplace/ShowTypeofplace'),
        //------------------------------Material-----------------------------------
        'show-material': require('./components/Materials/ShowMaterial'),
        //------------------------------Product-----------------------------------
        'show-product': require('./components/Products/ShowProduct'),
        //------------------------------Employee-----------------------------------
        'show-employee': require('./components/Employees/ShowEmployees'),
        //------------------------------Trader-----------------------------------
        'show-trader': require('./components/Traders/ShowTraders'),
        //------------------------------Control-----------------------------------
        'show-control': require('./components/Controls/ShowControls'),
        //------------------------------Contract-----------------------------------
        'show-contract': require('./components/Contracts/ShowContracts'),
        //------------------------------Taxation-----------------------------------
        'show-taxation': require('./components/Taxations/ShowTaxations'),
        //------------------------------Promotion-----------------------------------
        'show-promotion': require('./components/Promotions/ShowPromotion'),
        // ------------------------------place-----------------------------------
        'show-place': require('./components/Places/ShowPlace'),
        // ##########################################################################
        // #############################  Web  ######################################
        // ##########################################################################
        // ------------------------------Categories-----------------------------------
        'show-category': require('./components/Categories/ShowCategories'),
        // ---------------------------------Tags--------------------------------------
        'show-tag': require('./components/Tags/ShowTags'),
        // -------------------------------Articles--------------------------------------
        'show-article': require('./components/Articles/ShowArticles')


    }
});
