import Pagination from '../../../Pagination/src/Component.vue'

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
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchRole(1);
        this.permissionrole();
    },

    // ---------------------------------------------------------------------------------

    methods: {
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
                    this.fetchRole();
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

        fetchRole: function(page) {
            this.$http.get('http://localhost:8000/api/v1/roles?page='+page).then((response) => {
                this.$set('roles', response.data.data)
                this.$set('pagination', response.data)
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
                    this.fetchRole();
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
                    this.fetchRole();
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

        // Outros funções
        navigate (page) {
            this.fetchRole(page);
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
