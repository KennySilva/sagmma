import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
export default{
    name: 'ShowEmployees',


    data(){
        return {
            showColumn: {
                nickname: '',
                ic: '',
                nif: '',
                age: '',
                email: '',
                phone: '',
                echelon: '',
                service_beginning: '',
                market_id: '',
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
                market_id         : '',
                typeofemployee_id : '',
                photo             : '',
                description       : '',
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

        employeeMarket: function() {
            this.$http.get('http://localhost:8000/api/v1/employeeMarket').then((response) => {
                this.$set('markets', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        employeeType: function() {
            this.$http.get('http://localhost:8000/api/v1/employeeType').then((response) => {
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

        // statusEmployeesChange: function(employeeStatus) {
        //     var postData = {id: employeeStatus};
        //
        //     this.$http.post('http://localhost:8000/api/v1/employee/', postData).then((response) => {
        //         console.log(response.status);
        //         console.log(response.data);
        //         if (response.status == 200) {
        //             this.fetchEmployee(this.pagination.current_page);
        //         }
        //     }, (response) => {
        //         console.log("Ocorreu um erro na operação");
        //     });
        // },


        // --------------------------------------------------------------------------------------------


        // Outros funções
        navigate (page) {
            this.fetchEmployee(page);
        },


    },


    ready () {
        this.fetchEmployee(this.pagination.current_Page)
        this.employeeMarket()
        this.employeeType()

    },


    components: {
        'Pagination': Pagination,
    }
}
