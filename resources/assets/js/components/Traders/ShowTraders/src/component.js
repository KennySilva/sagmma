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
                get_acount        : false,
            },

            traders  : {},

            sortColumn : 'name',
            sortInverse: 1,
            filter           : {
                term         : ''
            },
            columnsFiltered: ['name'],
            pagination       : {},
            success          : false,
            msgSucess        : '',
            typeAlert        : '',
            all              : {},
            showRow: '',
            errors           : [],
            auth: [],

            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendTrader: '',
        }
    },


    ready () {
        this.fetchTrader(this.pagination.current_Page, this.showRow)

        var self = this
        jQuery(self.$els.tradercols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.statecreate).select2({
            placeholder: "Ilha",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.state', jQuery(this).val());
        });

        jQuery(self.$els.stateedit).select2({
            placeholder: "Ilha",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.state', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.councilcreate).select2({
            placeholder: "Concelho",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.council', jQuery(this).val());
        });

        jQuery(self.$els.counciledit).select2({
            placeholder: "Concelho",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.council', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------
        jQuery(self.$els.parishcreate).select2({
            placeholder: "Freguesia",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.parish', jQuery(this).val());
        });
        jQuery(self.$els.parishedit).select2({
            placeholder: "Freguesia",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTrader.parish', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------
    },


    methods: {

        selectAll: function() {
                    this.deleteMultIten = [];
                    if (!this.allSelected) {
                        for (trader in this.traders) {
                            this.deleteMultIten.push(this.traders[trader].id);
                        }
                    }
                },

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
                get_acount        : false,
            };
        },
        // --------------------------------------------------------------------------------------------

        createTrader: function() {
            //Trader input
            var trader = this.newTrader;

            //Clear form input
            this.clearField();
            this.$http.post('/api/v1/traders/', trader).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-trader').modal('hide');
                    this.fetchTrader(this.pagination.current_page, this.showRow);
                    this.alert('Comerciante Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTrader: function(page, row) {
            this.$http.get('/api/v1/allTraders/'+row+'?page='+page).then((response) => {
                this.$set('traders', response.data.data);
                this.$set('all', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        canDeleteAll: function() {
            var trads = this.traders;
            for (var trad in trads) {
                if (trads[trad].contract != null || trads[trad].promotion.length > 0) {
                    return true;
                }
            }
        },

        undelete_alert: function() {
            $.alert({
                icon: 'fa fa-exclamation-triangle',
                title: 'Ação Crítico',
                content: 'Informação realacionada com a Integridade de outros dados!!',
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTrader: function(id){
            this.$http.get('/api/v1/traders/' + id).then((response) => {
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
            this.$http.patch('/api/v1/traders/'+ id, trader).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-trader').modal('hide');
                    this.fetchTrader(this.pagination.current_page, this.showRow);
                    this.alert('Comerciante atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteTrader: function(id) {
            this.$http.delete('/api/v1/traders/'+ id).then((response) => {
                $('#modal-delete-trader').modal('hide');
                if (response.status == 200) {
                    this.fetchTrader(this.pagination.current_page, this.showRow);
                    this.alert('Comerciante eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultTrader: function() {
            this.$http.delete('/api/v1/deleteMultTraders/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAll').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchTrader(this.pagination.current_page, this.showRow);
                    this.alert('Funcionários eliminados com sucesso', 'warning');
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


        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(trader) {
                    return self.columnsFiltered.some(function(column) {
                        return trader[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('traders', filtered)
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchTrader(page, this.showRow);
        },
    },


    components: {
        'Pagination': Pagination,
    }
}
