import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-control',

    data(){
        return {
            newControl: {
                id          : '',
                employee_id : '',
                material_id : '',
                status      : '',
                author      : '',
                employee: [],
                material: [],
            },

            controls : {},
            employees: [],
            materials: [],

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
            auth: {},
            moreColumn: {
                author: false,

            },
            errors: [],

            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendEmployee: '',

        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchControl(this.pagination.current_Page, this.showRow);
        this.controlEmployee()
        this.controlMaterial()
        this.authUser()
        self = this
        jQuery(self.$els.controlcols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // ----------------------------------------------------------------
        jQuery(self.$els.employeecreate).select2({
            placeholder: "Funcionários",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newControl.employee_id', jQuery(this).val());
        });
        jQuery(self.$els.materialcreate).select2({
            placeholder: "Material",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newControl.material_id', jQuery(this).val());
        });
        // ----------------------------------------------------------------
        jQuery(self.$els.employeeedit).select2({
            placeholder: "Funcionários",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newControl.employee_id', jQuery(this).val());
        });
        jQuery(self.$els.materialedit).select2({
            placeholder: "Material",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newControl.material_id', jQuery(this).val());
        });
        // ----------------------------------------------------------------
    },

    // ---------------------------------------------------------------------------------

    methods: {

        selectAll: function() {
                    this.deleteMultIten = [];
                    if (!this.allSelected) {
                        for (type in this.controls) {
                            this.deleteMultIten.push(this.controls[type].id);
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
            this.newControl = {
                id          : '',
                employee_id : '',
                material_id : '',
                status      : '',
                author      : '',
                employee: [],
                material: [],
            };
        },


        createControl: function() {
            var control = this.newControl;

            //Clear form input
            this.$http.post('http://localhost:8000/api/v1/controls/', control).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-control').modal('hide');
                    this.clearField();
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                    this.alert('Registo Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchControl: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allControls/'+row+'?page='+page).then((response) => {
                this.$set('controls', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        canDeleteAll: function() {
            var contrs = this.controls;
            for (var cl in contrs) {
                if (contrs[cl].status == false) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisControl: function(id){
            this.clearField()

            this.$http.get('http://localhost:8000/api/v1/controls/' + id).then((response) => {
                this.newControl.id          = response.data.id;
                this.newControl.employee_id = response.data.employee_id;
                this.newControl.material_id = response.data.material_id;
                this.newControl.author      = response.data.author;
                this.newControl.status      = response.data.status;

                var employee        = response.data.employees;
                var material        = response.data.materials;

                for (var emp in employee) {
                    self.newControl.employee.push(employee[emp])
                }

                for (var mat in material) {
                    self.newControl.material.push(material[mat])
                }
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedControl: function(id) {
            var control = this.newControl;
            this.$http.patch('http://localhost:8000/api/v1/controls/'+ id, control).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-control').modal('hide');
                    this.clearField();
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                    this.alert('Registo Atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },
        // --------------------------------------------------------------------------------------------

        deleteControl: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/controls/'+ id).then((response) => {
                $('#modal-delete-control').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                    this.alert('Registo eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultControls: function() {
            this.$http.delete('http://localhost:8000/api/v1/deleteMultControls/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllControls').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchControl(this.pagination.current_page, this.showRow);
                    this.alert('Mercado(s) eliminado(s) com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        // -------------------------Metodo de suporte---------------------------------------------------
        controlEmployee: function() {
            this.$http.get('http://localhost:8000/api/v1/controlEmployee').then((response) => {
                this.$set('employees', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        controlMaterial: function() {
            this.$http.get('http://localhost:8000/api/v1/controlMaterial').then((response) => {
                this.$set('materials', response.data);
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


        statusControlsChange: function(controlStatus) {
            var postData = {id: controlStatus};
            this.$http.post('http://localhost:8000/api/v1/controlStatus/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(controlarregisto) {
                    return self.columnsFiltered.some(function(column) {
                        return controlarregisto[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('controls', filtered)
        },


        // Outros funções
        navigate (page) {
            this.fetchControl(page, this.showRow);
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
