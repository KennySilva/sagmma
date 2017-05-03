import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

import myDatepicker from 'vue-datepicker/vue-datepicker-1.vue'



export default{

    name: 'show-taxation',

    data(){
        return {
            newTaxation: {
                id          : '',
                employee_id : '',
                place_id    : '',
                income      : '',
                type        : '',
                author        : '',
                employees  : [],
                places  : [],
                created_at  : '',
            },

            taxations : {},
            employees : {},
            trashedTaxations : {},
            placesInt    : [],
            placesExt    : [],

            sortColumn : 'employee_id',
            sortInverse: 1,
            filter: {
                term: '',
                trash: '',
            },
            columnsFiltered: [],
            pagination: {},
            success: false,
            msgSucess: '',
            typeAlert: '',
            showRow: '',
            typeData: '',
            all: {},
            report_date: '',
            auth: [],

            report   : {
                day  : '',
                month: '',
                year : '',
            },
            sendTaxation: '',
            errors: [],
            verifyEmployee: false,

            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendEmployee: '',

            myDate: new Date(),

            // Vue-Datepicker
            option: {
                type: 'day',
                week: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                month: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                format: 'YYYY-MM-DD',
                placeholder: 'Data',
                inputStyle: {
                    'display': 'inline',
                    'padding': '6px',
                    'line-height': '20px',
                    'font-size': '14px',
                    'border': '1px solid #d2d6de',
                    'box-shadow': '0 1px 3px 0 rgba(0, 0, 0, 0.2)',
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
                    ok: 'OK',
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
                // to: this.myDate,
            }],
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {

        this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData)
        this.taxationEmployee()
        this.taxationIntPlace()
        this.taxationExtPlace()
        this.authUser()
        var self = this
        jQuery(self.$els.taxationcols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // ---------------------------------------------------------------------------------------------------
        jQuery(self.$els.typecreate).select2({
            placeholder: "Tipo de Cobrança",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.type', jQuery(this).val());
        });

        jQuery(self.$els.typeedit).select2({
            placeholder: "Tipo de Cobrança",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.type', jQuery(this).val());
        });
        // ---------------------------------------------------------------------------------------------------

        jQuery(self.$els.placecreate).select2({
            placeholder: "Espaços",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.place_id', jQuery(this).val());
        });

        jQuery(self.$els.placeedit).select2({
            placeholder: "Espaços",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.place_id', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------------------
        jQuery(self.$els.employeecreate).select2({
            placeholder: "Funcionários",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.employee_id', jQuery(this).val());
        });

        jQuery(self.$els.employeeedit).select2({
            placeholder: "Funcionários",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newTaxation.employee_id', jQuery(this).val());
        });




    },

    // -----------------------------------------------------------------------------------------------

    methods: {

        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (type in this.taxations) {
                    this.deleteMultIten.push(this.taxations[type].id);
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
            this.newTaxation = {
                id          : '',
                employee_id : '',
                place_id : '',
                income : '',
                type : '',
                author : '',
                employees : [],
                places : [],
            };
            this.sendTaxation = '';
        },



        createTaxation: function() {
            var taxation = this.newTaxation;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/taxations/', taxation).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-taxation').modal('hide');
                    this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                    console.log('correu bem');
                    this.alert('Registo criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTaxation: function(page, row, type) {
            this.trashedTaxation()
            this.$http.get('http://localhost:8000/api/v1/allTaxations/'+row+'/'+type+'?page='+page).then((response) => {
                this.$set('taxations', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },


        // canDeleteAll: function() {
        //     var taxs = this.taxations;
        //     for (var tx in taxs) {
        //         if (taxs[tx].status == true) {
        //             return true;
        //         }
        //     }
        // },

        // --------------------------------------------------------------------------------------------

        getThisTaxation: function(id){
            var self = this;
            this.clearField()

            this.$http.get('http://localhost:8000/api/v1/taxations/' + id).then((response) => {
                this.newTaxation.id          = response.data.id;
                this.newTaxation.employee_id = response.data.employee_id;
                this.newTaxation.place_id    = response.data.place_id;
                this.newTaxation.income      = response.data.income;
                this.newTaxation.type        = response.data.type;
                this.newTaxation.author        = response.data.author;
                var employees        = response.data.employees;
                var places        = response.data.places;

                for (var emp in employees) {
                    self.newTaxation.employees.push(employees[emp])
                }

                for (var place in places) {
                    self.newTaxation.places.push(places[place])
                }

            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTaxation: function(id) {
            var taxation = this.newTaxation;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/taxations/'+ id, taxation).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-taxation').modal('hide');
                    // console.log(response.data);
                    this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                    this.alert('Registo atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTaxation: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/taxations/'+ id).then((response) => {
                $('#modal-delete-taxation').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                    this.alert('Registo eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultTaxations: function() {
            this.$http.delete('http://localhost:8000/api/v1/deleteMultTaxations/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllTaxations').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchTaxation(this.pagination.current_page, this.showRow);
                    this.alert('Mercado(s) eliminado(s) com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        sendEmailTaxation: function(id) {
            var sendTaxation = this.sendTaxation;
            this.$http.get('http://localhost:8000/api/v1/sendTaxation/'+id+'/'+sendTaxation).then((response) => {
                $('#send-email').modal('hide');
                if (response.status == 200) {
                    this.alert('Recibo enviado para '+this.sendTaxation+' com sucesso', 'success');
                    this.clearField();

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        taxationIntPlace: function() {
            this.$http.get('http://localhost:8000/api/v1/taxationIntPlace').then((response) => {
                this.$set('placesInt', response.data);
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        authUser: function() {
            this.$http.get('http://localhost:8000/api/v1/authUser').then((response) => {
                this.$set('auth', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        checkPermition: function() {
            var roles = this.auth.roles;
            for (var rol in roles) {
                if (roles[rol].name == 'admin' || roles[rol].name == 'super-admin' || roles[rol].name == 'manager' || roles[rol].name == 'dpel') {
                    return true;
                }
            }
        },



        taxationExtPlace: function() {
            this.$http.get('http://localhost:8000/api/v1/taxationExtPlace').then((response) => {
                this.$set('placesExt', response.data);
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        //-----------------------------------------------------------------------------------------------

        taxationEmployee: function() {
            this.$http.get('http://localhost:8000/api/v1/taxationEmployee').then((response) => {
                this.$set('employees', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        trashedTaxation: function() {
            this.$http.get('/api/v1/trashedTaxation').then((response) => {
                this.$set('trashedTaxations', response.data);
            }, (response) => {
            });
        },

        deleteTrashedTaxation: function(id) {
            var con = confirm("Certeza que queres apagar esta informação?");
            if (con) {
                this.$http.delete('/api/v1/deleteTrashedTaxation/'+ id).then((response) => {
                    // $('#trashedTaxation').modal('hide');
                    if (response.status == 200) {
                        this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                        this.alert('Registo Apagado Permanentemente', 'info');
                    }
                }, (response) => {
                });
            }
        },

        deleteAllTrashedTaxation: function() {
            var con = confirm("Operação sem retorno, continuar?");
            if (con) {
                this.$http.get('/api/v1/deleteAllTrashedTaxation').then((response) => {
                    $('#trashedTaxation').modal('hide');
                    if (response.status == 200) {
                        this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                        this.alert('Todos os Registos Apagado Permanentemente', 'info');
                    }
                }, (response) => {
                });
            }

        },


        restoreTrashedTaxation: function(id) {


            this.$http.get('/api/v1/restoreTrashedTaxation/'+ id).then((response) => {
                // $('#trashedTaxation').modal('hide');
                if (response.status == 200) {
                    this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                    this.alert('Registo Restaurado com sucesso', 'success');
                }
            }, (response) => {
            });
        },

        restoreAllTrashedTaxation: function() {
            this.$http.get('/api/v1/restoreAllTrashedTaxation').then((response) => {
                $('#trashedTaxation').modal('hide');

                if (response.status == 200) {
                    this.fetchTaxation(this.pagination.current_Page, this.showRow, this.typeData);
                    this.alert('Registos Restaurado com sucesso', 'success');
                }
            }, (response) => {
            });
        },


        // --------------------------------------------------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(taxation) {
                    return self.columnsFiltered.some(function(column) {
                        return taxation[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('taxations', filtered)
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




        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchTaxation(page, this.showRow, this.typeData);
        },


    },

    // ---------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
        'date-picker': myDatepicker

    },
}
