import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
export default{
    name: 'ShowPromotion',


    data(){
        return {
            showColumn: {
                ic: '',
                service_beginning: '',
            },
            newPromotion: {
                id            : '',
                name          : '',
                begnning_date : '',
                ending_date   : '',
                trader_id     : '',
                product_id    : '',
                status        : '',
                description   : '',
            },


            promotions  : {},
            traders    : [],
            products      : [],


            sortColumn : 'name',
            sortInverse: 1,
            filter     : {
                term   : ''
            },
            pagination : {},
            success    : false,
        }
    },


    methods: {
        clearField: function(){
            this.newPromotion = {
                id            : '',
                name          : '',
                begnning_date : '',
                ending_date   : '',
                trader_id     : '',
                product_id    : '',
                status        : '',
                description   : '',
            };
        },

        // --------------------------------------------------------------------------------------------

        createPromotion: function() {
            //Promotion input
            var promotion = this.newPromotion;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/promotions/', promotion).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-promotion').modal('hide');
                    console.log(response.data);
                    this.fetchPromotion(this.pagination.last_Page);
                    var self = this;
                    this.success = true;
                    setTimeout(function() {
                        self.success = false;
                    }, 5000);
                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchPromotion: function(page) {
            this.$http.get('http://localhost:8000/api/v1/promotions?page='+page).then((response) => {
                this.$set('promotions', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisPromotion: function(id){
            this.$http.get('http://localhost:8000/api/v1/promotions/' + id).then((response) => {
                this.newPromotion.id            = response.data.id;
                this.newPromotion.name          = response.data.name;
                this.newPromotion.begnning_date = response.data.begnning_date;
                this.newPromotion.ending_date   = response.data.ending_date;
                this.newPromotion.trader_id     = response.data.trader_id;
                this.newPromotion.product_id    = response.data.product_id;
                this.newPromotion.status        = response.data.status;
                this.newPromotion.description   = response.data.description;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedPromotion: function(id) {
            var promotion = this.newPromotion;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/promotions/'+ id, promotion).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-promotion').modal('hide');
                    // console.log(response.data);
                    this.fetchPromotion(this.pagination.current_page);

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deletePromotion: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/promotions/'+ id).then((response) => {
                $('#modal-delete-promotion').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchPromotion();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionTrader: function() {
            this.$http.get('http://localhost:8000/api/v1/promotionTrader').then((response) => {
                this.$set('traders', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionProduct: function() {
            this.$http.get('http://localhost:8000/api/v1/promotionProduct').then((response) => {
                this.$set('products', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionStatus: function(status) {
            var postData = {id: status};

            this.$http.post('http://localhost:8000/api/v1/promotionStatus/', postData).then((response) => {
                console.log(response.status);
                console.log(response.data);
                if (response.status == 200) {
                    this.fetchPromotion(this.pagination.current_page);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        // -------------------------Metodo de suporte---------------------------------------------------

        doSort: function(ev, column) {
            var self = this;
            ev.preventDefault()
            self.sortColumn = column;
            if (self.sortInverse == 1) {
                self.sortInverse = -1
            }else {
                self.sortInverse = 1
            }
            // console.log(ev);
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchPromotion(page);
        },


    },


    ready () {
        this.fetchPromotion(this.pagination.current_Page)
        this.promotionTrader()
        this.promotionProduct()

    },


    components: {
        'Pagination': Pagination,
    }
}
