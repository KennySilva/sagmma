import vSelect from 'vue-select'
import Pagination from '../../../Pagination/src/Component.vue'


export default{

    name: 'show-contract',

    data(){
        return {
            selected: null,
            // options: [],

            newContract: {
                id          : '',
                place_id : '',
                trader_id : '',
                status : '',
                rate : '',
            },

            contracts : {},
            places: [],
            traders: [],

            sortColumn : 'id',
            sortInverse: 1,
            filter: {
                term: ''
            },
            pagination: {},
            success: false,
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchContract(1);
        this.contractPlace();
        this.contractTrader();
        // this.getTraders();
    },

    // ---------------------------------------------------------------------------------

    methods: {
        // getTraders: function() {
        //     var self = this;
        //     // this.options = this.traders.name;
        //     this.options.push(this.traders.name);
        // },

        clearField: function(){
            this.newContract = {
                id       : '',
                place_id : '',
                trader_id : '',
                status   : '',
                rate     : '',
            };
        },


        createContract: function() {
            var contract = this.newContract;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/contracts/', contract).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-contract').modal('hide');
                    this.fetchContract();
                    console.log('correu bem');
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

        fetchContract: function(page) {
            this.$http.get('http://localhost:8000/api/v1/contracts?page='+page).then((response) => {
                this.$set('contracts', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisContract: function(id){
            this.$http.get('http://localhost:8000/api/v1/contracts/' + id).then((response) => {
                this.newContract.id        = response.data.id;
                this.newContract.place_id  = response.data.place_id;
                this.newContract.trader_id = response.data.trader_id;
                this.newContract.status    = response.data.status;
                this.newContract.rate      = response.data.rate;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedContract: function(id) {
            var contract = this.newContract;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/contracts/'+ id, contract).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-contract').modal('hide');
                    // console.log(response.data);
                    this.fetchContract();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteContract: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/contracts/'+ id).then((response) => {
                $('#modal-delete-contract').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchContract();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        contractTrader: function() {
            this.$http.get('http://localhost:8000/api/v1/contractTrader').then((response) => {
                this.$set('traders', response.data);
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        contractPlace: function() {
            this.$http.get('http://localhost:8000/api/v1/contractPlace').then((response) => {
                this.$set('places', response.data);
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
        },


        statusContractsChange: function(contractStatus) {
            var postData = {id: contractStatus};
            this.$http.post('http://localhost:8000/api/v1/contractStatus/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchContract();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchContract(page);
        },


    },

    // ---------------------------------------------------------------------------------

    computed: {
    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
        'vSelect': vSelect
    },
}
