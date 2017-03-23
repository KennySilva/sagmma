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
            auth: [],

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
            self.$set('newPromotion.material_id', jQuery(this).val());
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
            self.$set('newPromotion.material_id', jQuery(this).val());
        });
        // ----------------------------------------------------------------
    },

    // ---------------------------------------------------------------------------------

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
            this.newControl = {
                id          : '',
                employee_id : '',
                material_id : '',
                status      : '',
            };
        },


        createControl: function() {
            var control = this.newControl;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/controls/', control).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-control').modal('hide');
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                    alert('Registo Criado com sucesso', 'success');
                }
            }, (response) => {

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

        // --------------------------------------------------------------------------------------------

        getThisControl: function(id){
            this.$http.get('http://localhost:8000/api/v1/controls/' + id).then((response) => {
                this.newControl.id          = response.data.id;
                this.newControl.employee_id = response.data.employee_id;
                this.newControl.material_id = response.data.material_id;
                this.newControl.status      = response.data.status;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedControl: function(id) {
            var control = this.newControl;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/controls/'+ id, control).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-control').modal('hide');
                    this.fetchControl(this.pagination.current_Page, this.showRow);
                    this.alert('Registo Atualizado com sucesso', 'info');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
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
