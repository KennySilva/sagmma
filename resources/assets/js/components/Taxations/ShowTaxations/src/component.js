import Pagination from '../../../Pagination/src/Component.vue'


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
                created_at  : '',
            },

            taxations : {},
            employees : [],
            placesInt    : [],
            placesExt    : [],

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
            report_date: '',
            auth: [],

            report   : {
                day  : '',
                month: '',
                year : '',
            },

            myDate: new Date(),
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTaxation(this.pagination.current_Page, this.showRow)
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

        jQuery(self.$els.employeedit).select2({
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
            };
        },


        createTaxation: function() {
            var taxation = this.newTaxation;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/taxations/', taxation).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-taxation').modal('hide');
                    this.fetchTaxation(this.pagination.current_Page, this.showRow);
                    console.log('correu bem');
                    this.alert('Registo criado com sucesso', 'success');

                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTaxation: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allTaxations/'+row+'?page='+page).then((response) => {
                this.$set('taxations', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTaxation: function(id){
            this.$http.get('http://localhost:8000/api/v1/taxations/' + id).then((response) => {
                this.newTaxation.id          = response.data.id;
                this.newTaxation.employee_id = response.data.employee_id;
                this.newTaxation.place_id    = response.data.place_id;
                this.newTaxation.income      = response.data.income;
                this.newTaxation.type        = response.data.type;
                this.newTaxation.created_at        = response.data.created_at;
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
                    this.fetchTaxation(this.pagination.current_Page, this.showRow);
                    this.alert('Registo atualizado com sucesso', 'info');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTaxation: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/taxations/'+ id).then((response) => {
                $('#modal-delete-taxation').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTaxation(this.pagination.current_Page, this.showRow);
                    this.alert('Estaço eliminado com sucesso', 'warning');

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
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
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
            this.fetchTaxation(page, this.showRow);
        },


    },

    // ---------------------------------------------------------------------------------

    computed: {

    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
    },
}
