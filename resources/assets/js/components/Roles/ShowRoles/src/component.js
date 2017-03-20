import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

// import from 'lodash'

import { map } from 'lodash'

export default{

    name: 'show-role',

    data(){
        return {
            newRole: {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
                permissions: [],
            },

            roles: {},
            permissions: [],
            openDetails: [],
            sortColumn: 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            pagination: {},
            success: false,
            msgSucess: '',
            typeAlert: '',
            all: {},
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchRole(1, this.showRow);
        this.permissionrole();
        var self = this
        jQuery(self.$els.rolecols).select2({
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

        resetPermissions: function(ev) {
            ev.preventDefault()
            this.newRole.permissions = ""
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

        createRole: function() {
            var role = this.newRole;

            //Clear form input
            this.newRole = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
                permissions: [],
            };
            this.$http.post('http://localhost:8000/api/v1/roles/', role).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-role').modal('hide');
                    // console.log(response.data);
                    this.fetchRole(1, this.showRow);
                    this.alert('Papel Criado com sucesso', 'success');
                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchRole: function(page, row) {
            var self = this
            self.$http.get('http://localhost:8000/api/v1/allRoles/'+row+'?page='+page).then((response) => {
                self.$set('roles', response.data.data)
                self.$set('all', response.data.data)
                self.$set('pagination', response.data)

                jQuery(self.$els.perms).select2({
                    placeholder: "Permissões",
                    allowClear: true,
                    theme: "bootstrap",
                    width: '100%',
                    language: 'pt',
                    tags: true,
                    //  maximumSelectionLength: 2
                    //  minimumResultsForSearch: Infinity

                }).on('change', function () {
                    self.$set('newRole.permissions', jQuery(this).val());
                });

                jQuery(self.$els.editperms).select2({
                    placeholder: "Permissões",
                    allowClear: true,
                    theme: "bootstrap",
                    width: '100%',
                    language: 'pt',
                }).on('change', function () {
                    self.$set('newRole.permissions', jQuery(this).val());
                });


            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisRole: function(id){
            this.$http.get('http://localhost:8000/api/v1/roles/' + id).then((response) => {
                this.newRole.id       = response.data.id;
                this.newRole.name     = response.data.name;
                this.newRole.display_name = response.data.display_name;
                this.newRole.description    = response.data.description;
                // this.newRole.permissions    = response.data.perms;
                this.$set('newRole.permissions', response.data.perms)
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedRole: function(id) {
            var role = this.newRole;

            this.newRole = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
            };

            this.$http.patch('http://localhost:8000/api/v1/roles/'+ id, role).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-role').modal('hide');
                    // console.log(response.data);
                    this.fetchRole(1, this.showRow);
                    this.alert('Papel atualizado com sucesso', 'info');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteRole: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/roles/'+ id).then((response) => {
                $('#modal-delete-role').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchRole(1, this.showRow);
                    this.alert('Papel eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        permissionrole: function() {
            this.$http.get('http://localhost:8000/api/v1/permissionrole').then((response) => {
                this.$set('permissions', response.data);
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

        // --------------------------------------------------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(role) {
                    return self.columnsFiltered.some(function(column) {
                        return role[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('roles', filtered)
        },
        // Outros funções
        navigate (page) {
            this.fetchRole(page, this.showUser);
        },

        clearField: function(){
            this.newRole = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
            };
        },

        doOpenDetails: function(ev, id)
        {
            ev.preventDefault();
            var self = this,
            index = self.openDetails.indexOf(id);
            if(index > -1)
            {
                self.openDetails.$remove(id);
            } else {
                self.openDetails.push(id);
            }
        },

        openAllDetails: function(ev)
        {
            ev.preventDefault();

            var self = this;

            // self.roles.map(function(role) {
            //     ids.push(role.id);
            // });

            if (self.openDetails.length > 0) {
                self.$set('openDetails', []);
            }else {
                self.$set('openDetails', map(self.roles, 'id'));
            }


            //    if(self.interaction.openDetails.length > 0)
            //    {
            //        Vue.set(self.interaction, 'openDetails', []);
            //    } else {
            //        Vue.set(self.interaction, 'openDetails', _.pluck(self.cervejarias.list, 'id'));
            //    }
        }

    },

    // ---------------------------------------------------------------------------------

    computed: {
    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
    },
}
