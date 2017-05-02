import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-typeofemployee',

    data(){
        return {
            newTypeofemployee: {
                id         : '',
                name       : '',
                description: '',
            },

            typeofemployees: {},
            sortColumn: 'name',
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
            errors: [],

            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendEmployee: '',

        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTypeofemployee(this.pagination.current_Page, this.showRow);
        var self = this
        jQuery(self.$els.typeofemployeecols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
    },

    // ---------------------------------------------------------------------------------

    methods: {

        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (type in this.typeofemployees) {
                    this.deleteMultIten.push(this.typeofemployees[type].id);
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
            this.newMarket = {
                id         : '',
                name       : '',
                location   : '',
                description: '',
                logo       : ''
            };
        },

        createTypeofemployee: function() {
            var typeofemployee = this.newTypeofemployee;

            //Clear form input

            this.$http.post('http://localhost:8000/api/v1/typeofemployees/', typeofemployee).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-typeofemployee').modal('hide');
                    this.clearField();
                    this.fetchTypeofemployee(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTypeofemployee: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allTypeofemployees/'+row+'?page='+page).then((response) => {
                this.$set('typeofemployees', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        canDeleteAll: function() {
            var types = this.typeofemployees;
            for (var type in types) {
                if (types[type].employees.length > 0) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisTypeofemployee: function(id){
            this.$http.get('http://localhost:8000/api/v1/typeofemployees/' + id).then((response) => {
                this.newTypeofemployee.id       = response.data.id;
                this.newTypeofemployee.name     = response.data.name;
                this.newTypeofemployee.location = response.data.location;
                this.newTypeofemployee.description    = response.data.description;
                this.newTypeofemployee.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTypeofemployee: function(id) {
            var typeofemployee = this.newTypeofemployee;
            this.$http.patch('http://localhost:8000/api/v1/typeofemployees/'+ id, typeofemployee).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-typeofemployee').modal('hide');
                    this.clearField();
                    this.fetchTypeofemployee(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTypeofemployee: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/typeofemployees/'+ id).then((response) => {
                $('#modal-delete-typeofemployee').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTypeofemployee(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultTypeofemployees: function() {
            this.$http.delete('http://localhost:8000/api/v1/deleteMultTypeofemployees/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllTypeofemployees').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchTypeofemployee(this.pagination.current_page, this.showRow);
                    this.alert('Tipos de Funcionários eliminados com sucesso', 'warning');
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
                filtered = _.filter(self.all, function(typeofemployee) {
                    return self.columnsFiltered.some(function(column) {
                        return typeofemployee[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('typeofemployees', filtered)
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
            this.fetchTypeofemployee(page, this.showRow);
        },

        clearField: function(){
            this.newTypeofemployee = {
                id         : '',
                name       : '',
                description: '',
            };
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
