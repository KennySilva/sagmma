import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-typeofplace',

    data(){
        return {
            newTypeofplace: {
                id         : '',
                name       : '',
                description: '',
            },

            typeofplaces: {},
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
            auth: [],


            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendplace: '',


        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTypeofplace(this.pagination.current_Page, this.showRow);
        this.authUser();
        var self = this
        jQuery(self.$els.typeofplacecols).select2({
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
                for (type in this.typeofplaces) {
                    this.deleteMultIten.push(this.typeofplaces[type].id);
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

        createTypeofplace: function() {
            var typeofplace = this.newTypeofplace;

            //Clear form input

            this.$http.post('/api/v1/typeofplaces/', typeofplace).then((response) => {
                if (response.status == 200) {
                    this.clearField();
                    console.log('chegando aqui');
                    $('#modal-create-typeofplace').modal('hide');
                    this.fetchTypeofplace(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário Criado com sucesso', 'success');
                    this.$set('errors', '');

                }
            }, (response) => {
                console.log(response.data.name);
                this.$set('errors', response.data)

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTypeofplace: function(page, row) {
            this.$http.get('/api/v1/allTypeofplaces/'+row+'?page='+page).then((response) => {
                this.$set('typeofplaces', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        canDeleteAll: function() {
            var types = this.typeofplaces;
            for (var type in types) {
                if (types[type].places.length > 0) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisTypeofplace: function(id){
            this.$http.get('/api/v1/typeofplaces/' + id).then((response) => {
                this.newTypeofplace.id       = response.data.id;
                this.newTypeofplace.name     = response.data.name;
                this.newTypeofplace.location = response.data.location;
                this.newTypeofplace.description    = response.data.description;
                this.newTypeofplace.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTypeofplace: function(id) {
            var typeofplace = this.newTypeofplace;
            this.$http.patch('/api/v1/typeofplaces/'+ id, typeofplace).then((response) => {
                if (response.status == 200) {
                    this.clearField();
                    $('#modal-edit-typeofplace').modal('hide');
                    // console.log(response.data);
                    this.fetchTypeofplace(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário atualizado com sucesso', 'info');
                    this.$set('errors', '');

                }
            }, (response) => {
                var self = this
                self.$set('errors', response.data)
            });
        },

        undelete_alert: function() {
            $.alert({
                icon: 'fa fa-exclamation-triangle',
                title: 'Ação Crítico',
                content: 'Informação realacionada com a Integridade de outros dados!!',
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTypeofplace: function(id) {
            this.$http.delete('/api/v1/typeofplaces/'+ id).then((response) => {
                $('#modal-delete-typeofplace').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTypeofplace(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultTypeofplaces: function() {
            this.$http.delete('/api/v1/deleteMultTypeofplaces/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllTypeofplaces').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchTypeofplace(this.pagination.current_page, this.showRow);
                    this.alert('Tipos de Funcionários eliminados com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        authUser: function() {
            this.$http.get('/api/v1/authUser').then((response) => {
                this.$set('auth', response.data);
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },
        // --------------------------------------------------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(typeofplace) {
                    return self.columnsFiltered.some(function(column) {
                        return typeofplace[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('typeofplaces', filtered)
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
            this.fetchTypeofplace(page, this.showRow);
        },

        clearField: function(){
            this.newTypeofplace = {
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
