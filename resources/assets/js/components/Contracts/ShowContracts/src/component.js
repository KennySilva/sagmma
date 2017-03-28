import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'
import myDatepicker from 'vue-datepicker/vue-datepicker-1.vue'

export default{

    name: 'show-contract',

    data(){
        return {
            selected: null,
            // options: [],

            newContract: {
                id          : '',
                place_id    : '',
                trader_id   : '',
                status      : '',
                rate        : '',
                author      : '',
                ending_date : '',
            },

            contracts : {},
            places: [],
            traders: [],

            sortColumn : 'id',
            sortInverse: 1,
            filter: {
                term: ''
            },
            columnsFiltered: [],
            pagination: {},
            success: false,
            msgSucess: '',
            typeAlert: '',
            showRow: '',
            all: {},
            auth: [],
            errors: [],
            // Vue-Datepicker
            option: {
                type: 'day',
                week: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                month: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                format: 'YYYY-MM-DD',
                placeholder: 'Data de expiração do Contrato',
                inputStyle: {
                    'display': 'inline-block',
                    'padding': '6px',
                    'line-height': '20px',
                    'font-size': '14px',
                    'border': '1px solid #d2d6de',
                    'border-radius': '0px',
                    'color': '#5F5F5F',
                    'min-width': '100%',
                    'width': 'auto'
                },
                color: {
                    header: '#228074',
                    headerText: '#ffffff'
                },
                buttons: {
                    cancel: 'Cancelar',
                    ok: 'Escolher',
                },
                overlayOpacity: 0.5, // 0.5 as default
                dismissible: true // as true as default
            },

            limit: [{
                type: 'weekday',
                available: [1, 2, 3, 4, 5, 6]
            },
            {
                type: 'fromto',
                from: '2017-02-01',
                // to: '2016-02-20'
            }],
            
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchContract(this.pagination.current_Page, this.showRow);

        // this.getTraders();
        var self = this
        jQuery(self.$els.contractcols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------

        jQuery(self.$els.placecreate).select2({
            placeholder: "Espaço",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newContract.place_id', jQuery(this).val());
        });

        jQuery(self.$els.placeedit).select2({
            placeholder: "Espaço",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newContract.place_id', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------
        jQuery(self.$els.tradercreate).select2({
            placeholder: "Comerciante",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newContract.trader_id', jQuery(this).val());
        });
        jQuery(self.$els.traderedit).select2({
            placeholder: "Comerciante",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newContract.trader_id', jQuery(this).val());
        });
        //
    },

    // ---------------------------------------------------------------------------------

    methods: {
        // getTraders: function() {
        //     var self = this;
        //     // this.options = this.traders.name;
        //     this.options.push(this.traders.name);
        // },

        alert: function(msg, typeAlert) {
            var self = this;
            this.success = true;
            this.msgSucess = msg;
            this.typeAlert = typeAlert;
            setTimeout(function() {
                self.success = false;
            }, 5000);
        },


        clearField: function(){
            this.newContract = {
                id          : '',
                place_id    : '',
                trader_id   : '',
                status      : '',
                rate        : '',
                author      : '',
                ending_date : '',
            };
        },

        createContract: function() {
            var contract = this.newContract;

            //Clear form input
            this.$http.post('http://localhost:8000/api/v1/contracts/', contract).then((response) => {
                if (response.status == 200) {
                    this.clearField();
                    $('#modal-create-contract').modal('hide');
                    this.fetchContract(this.pagination.current_Page, this.showRow);
                    console.log('correu bem');
                    this.alert('Registo criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------
        fetchContract: function(page, row) {
            this.contractPlace();
            this.contractTrader();
            this.$http.get('http://localhost:8000/api/v1/allContracts/'+row+'?page='+page).then((response) => {
                this.$set('contracts', response.data.data)
                this.$set('all', response.data.data)
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
            this.$http.patch('http://localhost:8000/api/v1/contracts/'+ id, contract).then((response) => {
                if (response.status == 200) {
                    this.clearField();
                    $('#modal-edit-contract').modal('hide');
                    // console.log(response.data);
                    this.fetchContract(this.pagination.current_Page, this.showRow);
                    this.alert('Registo atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },



        // --------------------------------------------------------------------------------------------

        deleteContract: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/contracts/'+ id).then((response) => {
                $('#modal-delete-contract').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchContract(this.pagination.current_Page, this.showRow);
                    this.alert('Estaço eliminado com sucesso', 'warning');

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

        doFilter: function() {

            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(contract) {
                    return self.columnsFiltered.some(function(column) {
                        return contract[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('contracts', filtered)
        },

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
            this.fetchContract(page, this.showRow);
        },


    },

    // ---------------------------------------------------------------------------------

    computed: {

    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
        'date-picker': myDatepicker
    },
}
