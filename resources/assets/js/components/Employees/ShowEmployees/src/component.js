import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'
import myDatepicker from 'vue-datepicker/vue-datepicker-1.vue'


export default{
    name: 'ShowEmployees',
    data(){
        return {
            showColumn: {
                ic: '',
                service_beginning: '',
            },
            newEmployee: {
                name              : '',
                ic                : '',
                age               : '',
                gender            : '',
                email             : '',
                state             : '',
                council           : '',
                parish            : '',
                zone              : '',
                phone             : '',
                echelon           : '',
                service_beginning : '',
                typeofemployee_id : '',
                photo             : '',
                description       : '',
                markets           : [],
                get_acount        : false,

            },
            employees  : {},
            markets    : [],
            types      : [],

            sortColumn : 'name',
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

            deleteMultIten: [],
            allSelected: false,
            selected: [],

            // Vue-Datepicker
            option: {
                type: 'day',
                week: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                month: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                format: 'YYYY-MM-DD',
                placeholder: 'Data de Inicio de Serviço',
                inputStyle: {
                    'display': 'inline-block',
                    'padding': '6px',
                    'line-height': '20px',
                    'font-size': '14px',
                    'border': '1px solid #d2d6de',
                    'border-radius': '0px',
                    'color': '#5F5F5F',
                    'min-width': '100%',
                    'width': '100%'
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


    ready () {
        this.fetchEmployee(this.pagination.current_Page, this.showRow)
        this.marketEmployee()
        this.employeeType()
        // -------------------------------------------------------------------------------------

        var self = this
        jQuery(self.$els.marketcols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.typecreate).select2({
            placeholder: "Tipo",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.typeofemployee_id', jQuery(this).val());
        });

        jQuery(self.$els.typeedit).select2({
            placeholder: "Tipo",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.typeofemployee_id', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------



        jQuery(self.$els.marketcreate).select2({
            placeholder: "Mercado",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.markets', jQuery(this).val());
        });


        jQuery(self.$els.marketedit).select2({
            placeholder: "Mercado",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.markets', jQuery(this).val());
        });

        // -------------------------------------------------------------------------------------

        jQuery(self.$els.statecreate).select2({
            placeholder: "Ilha",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.state', jQuery(this).val());
        });

        jQuery(self.$els.stateedit).select2({
            placeholder: "Ilha",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.state', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.councilcreate).select2({
            placeholder: "Concelho",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.council', jQuery(this).val());
        });

        jQuery(self.$els.counciledit).select2({
            placeholder: "Concelho",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.council', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.parishcreate).select2({
            placeholder: "Freguesia",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.parish', jQuery(this).val());
        });

        jQuery(self.$els.parishedit).select2({
            placeholder: "Freguesia",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.parish', jQuery(this).val());
        });
        // -------------------------------------------------------------------------------------

        jQuery(self.$els.echeloncreate).select2({
            placeholder: "Escalão",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.echelon', jQuery(this).val());
        });

        jQuery(self.$els.echelonedit).select2({
            placeholder: "Escalão",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newEmployee.echelon', jQuery(this).val());
        });
    },


    methods: {
        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (employee in this.employees) {
                    this.deleteMultIten.push(this.employees[employee].id);
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
            this.newEmployee = {
                name              : '',
                ic                : '',
                age               : '',
                gender            : '',
                email             : '',
                state             : '',
                council           : '',
                parish            : '',
                zone              : '',
                phone             : '',
                echelon           : '',
                service_beginning : '',
                market_id         : '',
                typeofemployee_id : '',
                photo             : '',
                get_acount       : '',
                description       : '',
                markets           : [],
                get_acount        : false,


            };
        },

        // --------------------------------------------------------------------------------------------

        createEmployee: function() {
            //Employee input
            var employee = this.newEmployee;

            //Clear form input
            this.$http.post('http://localhost:8000/api/v1/employees/', employee).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-employee').modal('hide');
                    this.clearField();
                    console.log(response.data);
                    this.fetchEmployee(this.pagination.last_Page, this.showRow);
                    this.alert('Funcionário Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchEmployee: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allEmployees/'+row+'?page='+page).then((response) => {
                this.$set('employees', response.data.data);
                this.$set('all', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisEmployee: function(id){
            this.$http.get('http://localhost:8000/api/v1/employees/' + id).then((response) => {
                this.newEmployee.id                = response.data.id;
                this.newEmployee.name              = response.data.name;
                this.newEmployee.ic                = response.data.ic;
                this.newEmployee.age               = response.data.age;
                this.newEmployee.gender            = response.data.gender;
                this.newEmployee.email             = response.data.email;
                this.newEmployee.state             = response.data.state;
                this.newEmployee.council           = response.data.council;
                this.newEmployee.parish            = response.data.parish;
                this.newEmployee.zone              = response.data.zone;
                this.newEmployee.phone             = response.data.phone;
                this.newEmployee.echelon           = response.data.echelon;
                this.newEmployee.service_beginning = response.data.service_beginning;
                this.newEmployee.market_id         = response.data.market_id;
                this.newEmployee.typeofemployee_id = response.data.typeofemployee_id;
                this.newEmployee.description       = response.data.description;
                this.newEmployee.markets           = response.data.markets;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedEmployee: function(id) {
            var employee = this.newEmployee;
            this.$http.patch('http://localhost:8000/api/v1/employees/'+ id, employee).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-employee').modal('hide');
                    this.clearField();
                    this.fetchEmployee(this.pagination.current_page, this.showRow);
                    this.alert('Funcionário atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteEmployee: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/employees/'+ id).then((response) => {
                $('#modal-delete-employee').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchEmployee(this.pagination.current_page, this.showRow);
                    this.alert('Funcionário eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultEmployee: function() {
            this.$http.delete('http://localhost:8000/api/v1/deleteMultEmployees/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    this.fetchEmployee(this.pagination.current_page, this.showRow);
                    this.alert('Funcionários eliminados com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        // employeeMarket: function() {
        //     this.$http.get('http://localhost:8000/api/v1/employeeMarket').then((response) => {
        //         this.$set('markets', response.data);
        //     }, (response) => {
        //         console.log("Ocorreu um erro na operação");
        //     });
        // },

        employeeType: function() {
            this.$http.get('http://localhost:8000/api/v1/employeeType').then((response) => {
                this.$set('types', response.data);
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

        alterGenderValue: function(employee) {
            if (employee == 'M') {
                return 'Masculino';
            }else if (employee == 'F') {
                return 'Feminino';
            }else {
                return 'Não Especificado';
            }

        },
        alterStateValue: function(employee) {
            if (employee == 1) {
                return 'Santiago';
            }else if (employee == 2) {
                return 'Maio';
            }else if (employee == 3) {
                return 'Fogo';
            }else if (employee == 4) {
                return 'Brava';
            }else if (employee == 5) {
                return 'Santo Antão';
            }else if (employee == 6) {
                return 'São Niculau';
            }else if (employee == 7) {
                return 'São Vicente';
            }else if (employee == 8) {
                return 'Sal';
            }else if (employee == 9) {
                return 'Boa Vista';
            }else {
                return 'Santa Luzia';
            }

        },

        // -------------------------Metodo de suporte---------------------------------------------------
        marketEmployee: function() {
            this.$http.get('http://localhost:8000/api/v1/marketEmployee').then((response) => {
                this.$set('markets', response.data);
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

        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(market) {
                    return self.columnsFiltered.some(function(column) {
                        return market[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('markets', filtered)
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchEmployee(page, this.showRow);
        },


    },




    components: {
        'Pagination': Pagination,
        'date-picker': myDatepicker
    }
}
