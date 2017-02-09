import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
export default{
    name: 'ShowTraders',


    data(){
        return {
            showColumn: {
                ic: '',
            },
            newTrader: {
                id          : '',
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
                photo       : '',
                description : '',
                get_email   : '',
                get_password: '',
            },

            traders  : {},

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
                id          : '',
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
                photo       : '',
                description : '',
                get_email   : '',
                get_password: '',
            };
        },

        // clearFieldGetEmail: function(){
        //     return {
        //         this.newTrader.get_email = '';
        //         this.newTrader.get_password = '';
        //     }
        // },

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
                    console.log(response.data);
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
                this.newTrader.id                = response.data.id;
                this.newTrader.name              = response.data.name;
                this.newTrader.ic                = response.data.ic;
                this.newTrader.age               = response.data.age;
                this.newTrader.gender            = response.data.gender;
                this.newTrader.email             = response.data.email;
                this.newTrader.state             = response.data.state;
                this.newTrader.council           = response.data.council;
                this.newTrader.parish            = response.data.parish;
                this.newTrader.zone              = response.data.zone;
                this.newTrader.phone             = response.data.phone;
                this.newTrader.description       = response.data.description;
                this.newTrader.markets           = response.data.markets;
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

        alterGenderValue: function(trader) {
            if (trader == 'M') {
                return 'Masculino';
            }else if (trader == 'F') {
                return 'Feminino';
            }else {
                return 'Não Especificado';
            }

        },
        alterStateValue: function(trader) {
            if (trader == 1) {
                return 'Santiago';
            }else if (trader == 2) {
                return 'Maio';
            }else if (trader == 3) {
                return 'Fogo';
            }else if (trader == 4) {
                return 'Brava';
            }else if (trader == 5) {
                return 'Santo Antão';
            }else if (trader == 6) {
                return 'São Niculau';
            }else if (trader == 7) {
                return 'São Vicente';
            }else if (trader == 8) {
                return 'Sal';
            }else if (trader == 9) {
                return 'Boa Vista';
            }else {
                return 'Santa Luzia';
            }

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
            this.fetchTrader(page);
        },
    },

    ready () {
        this.fetchTrader(this.pagination.current_Page)
    },

    components: {
        'Pagination': Pagination,
    }
}
