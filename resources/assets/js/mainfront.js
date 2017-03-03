var Vue = require('vue');
new Vue({
    el: '.frontPage',

    data: {
        text: 'Hola mundo',
        show: false,
    },

    methods: {
        showMenu: function(){
            if(this.show==true){
                this.show=false;
            }else {
                this.show=true;
            }
        },
    },

    components: {

    }
});
