import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
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
                get_email         : '',
                get_password      : '',

            },


            employees  : {},
            markets    : [],
            types      : [],


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
                description       : '',
                markets           : [],

            };
        },

        // --------------------------------------------------------------------------------------------

        createEmployee: function() {
            //Employee input
            var employee = this.newEmployee;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/employees/', employee).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-employee').modal('hide');
                    console.log(response.data);
                    this.fetchEmployee(this.pagination.last_Page);
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

        fetchEmployee: function(page) {
            this.$http.get('http://localhost:8000/api/v1/employees?page='+page).then((response) => {
                this.$set('employees', response.data.data);
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
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/employees/'+ id, employee).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-employee').modal('hide');
                    // console.log(response.data);
                    this.fetchEmployee(this.pagination.current_page);

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteEmployee: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/employees/'+ id).then((response) => {
                $('#modal-delete-employee').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchEmployee();
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

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchEmployee(page);
        },


    },


    ready () {
        this.fetchEmployee(this.pagination.current_Page)
        this.marketEmployee()
        this.employeeType()

    },


    components: {
        'Pagination': Pagination,
    }
}
