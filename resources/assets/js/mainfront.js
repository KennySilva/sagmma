var Vue = require('vue');
new Vue({
    el: '.frontPage',

    data: {
        text: 'Hola mundo',
        show: false,
    },


    methods: {
        showMenu: function(){
            // return this.show=true;
            this.$set('show', true)
        },

        hideMenu: function(){
            this.show=false;
        },
    },

    components: {

    }
});
