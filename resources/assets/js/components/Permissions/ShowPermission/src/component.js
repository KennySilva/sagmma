import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-permission',

    data(){
        return {
            newPermission: {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
            },

            permissions: {},
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
        this.fetchPermission(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        createPermission: function() {
            var permission = this.newPermission;

            //Clear form input
            this.newPermission = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
            };
            this.$http.post('http://localhost:8000/api/v1/permissions/', permission).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-permission').modal('hide');
                    // console.log(response.data);
                    this.fetchPermission();
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

        fetchPermission: function(page) {
            this.$http.get('http://localhost:8000/api/v1/permissions?page='+page).then((response) => {
                this.$set('permissions', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisPermission: function(id){
            this.$http.get('http://localhost:8000/api/v1/permissions/' + id).then((response) => {
                this.newPermission.id       = response.data.id;
                this.newPermission.name     = response.data.name;
                this.newPermission.display_name = response.data.display_name;
                this.newPermission.description    = response.data.description;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedPermission: function(id) {
            var permission = this.newPermission;

            this.newPermission = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
            };

            this.$http.patch('http://localhost:8000/api/v1/permissions/'+ id, permission).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-permission').modal('hide');
                    // console.log(response.data);
                    this.fetchPermission();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deletePermission: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/permissions/'+ id).then((response) => {
                $('#modal-delete-permission').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchPermission();
                }
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
            this.fetchPermission(page);
        },

        clearField: function(){
            this.newPermission = {
                id           : '',
                name         : '',
                display_name : '',
                description  : '',
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
