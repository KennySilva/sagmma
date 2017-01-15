import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
export default{
    name: 'ShowTraders',


    data(){
        return {
            showColumn: {
                ic      : '',
                age     : '',
                council : '',
                parish  : '',
                status  : '',
            },
            newTrader: {
                name        : '',
                ic          : '',
                age         : '',
                gender      : '',
                email       : '',
                state       : '',
                council     : '',
                parish      : '',
                zone        : '',
                phone       : '',
                status      : '',
                photo       : '',
                description : '',
            },


            traders  : {},
            products : [],
            types    : [],


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
            this.newTrader = {
                name        : '',
                ic          : '',
                age         : '',
                gender      : '',
                email       : '',
                state       : '',
                council     : '',
                parish      : '',
                zone        : '',
                phone       : '',
                status      : '',
                photo       : '',
                description : '',
            };
        },

        // --------------------------------------------------------------------------------------------

        createTrader: function() {
            //Trader input
            var trader = this.newTrader;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/traders/', trader).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-trader').modal('hide');
                    this.fetchTrader(this.pagination.last_Page);
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

        fetchTrader: function(page) {
            this.$http.get('http://localhost:8000/api/v1/traders?page='+page).then((response) => {
                this.$set('traders', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTrader: function(id){
            this.$http.get('http://localhost:8000/api/v1/traders/' + id).then((response) => {
                this.newTrader.id              = response.data.id;
                this.newTrader.name            = response.data.name;
                this.newTrader.ic              = response.data.ic;
                this.newTrader.age             = response.data.age;
                this.newTrader.gender        = response.data.gender;
                this.newTrader.email             = response.data.email;
                this.newTrader.state           = response.data.state;
                this.newTrader.council         = response.data.council;
                this.newTrader.parish          = response.data.parish;
                this.newTrader.zone            = response.data.zone;
                this.newTrader.phone           = response.data.phone;
                this.newTrader.status          = response.data.status;
                this.newTrader.photo           = response.data.photo;
                // this.newTrader.product_id      = response.data.product_id;
                // this.newTrader.typeoftrader_id = response.data.typeoftrader_id;

            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTrader: function(id) {
            var trader = this.newTrader;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/traders/'+ id, trader).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-trader').modal('hide');
                    this.fetchTrader(this.pagination.current_page);

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteTrader: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/traders/'+ id).then((response) => {
                $('#modal-delete-trader').modal('hide');
                if (response.status == 200) {
                    this.fetchTrader();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        traderProduct: function() {
            this.$http.get('http://localhost:8000/api/v1/traderProduct').then((response) => {
                this.$set('products', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        traderType: function() {
            this.$http.get('http://localhost:8000/api/v1/traderType').then((response) => {
                this.$set('types', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },



        // --------------------------------------------------------------------------------------------

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
            this.fetchTrader(page);
        },

        alterStatusValue: function(traders) {
            if (traders == 1) {
                return 'Normalizado(a)';
            }else if (traders == 2) {
                return 'Pendente';
            }else if (traders == 3) {
                return 'Crítico(a)'
            }else {
                return 'Desativado(a)';
            }

        },


    },


    ready () {
        this.fetchTrader(this.pagination.current_Page)
        this.traderProduct()
        this.traderType()

    },


    components: {
        'Pagination': Pagination,
    }
}
