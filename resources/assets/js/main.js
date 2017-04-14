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
    //
    // methods: {
    //     var self = this;
    //     jQuery(self.$els.state).select2({
    //         placeholder: "Ilha",
    //         allowClear: true,
    //         theme: "bootstrap",
    //         width: '100%',
    //         language: 'pt',
    //     }).on('change', function () {
    //         self.$set(profile.state, jQuery(this).val());
    //     });
    //
    //     jQuery(self.$els.council).select2({
    //         placeholder: "Concelho",
    //         allowClear: true,
    //         theme: "bootstrap",
    //         width: '100%',
    //         language: 'pt',
    //     }).on('change', function () {
    //         self.$set(profile.council, jQuery(this).val());
    //     });
    //
    //     jQuery(self.$els.parish).select2({
    //         placeholder: "Fraguezia",
    //         allowClear: true,
    //         theme: "bootstrap",
    //         width: '100%',
    //         language: 'pt',
    //     }).on('change', function () {
    //         self.$set(profile.parish, jQuery(this).val());
    //     });
    // },
    

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
