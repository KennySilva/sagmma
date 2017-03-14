import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

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
            all: {},
            sortColumn: 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            columnsFiltered: [],
            pagination: {},
            success: false,
            showRow: '',
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchPermission(1, this.showRow);
        var self = this
        jQuery(self.$els.perms).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });

    },


    // watch() {
    //     this.fetchPermission(1, this.showRow);
    // },

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
                    this.fetchPermission(1, this.showRow);
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

        fetchPermission: function(page, row) {
            var self = this
            this.$http.get('http://localhost:8000/api/v1/getAllpermissions/'+row+'?page='+page).then((response) => {
                this.$set('permissions', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)

                // jQuery(self.$els.perms).select2({
                //     placeholder: "Coluna",
                //     allowClear: true,
                //     theme: "bootstrap",
                //     width: '100%',
                //     language: 'pt',
                //
                //
                // }).on('change', function () {
                //     self.$set('columnsFiltered', jQuery(this).val());
                // });


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
                    this.fetchPermission(1, this.showRow);
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
                    this.fetchPermission(1, this.showRow);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------
        doFilter: function() {
            // this.$set('filter.term', ev.currentTarget.value)
            // console.log(this.filter.term);
            var self = this

            filtered = self.all

            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(permission) {
                    return self.columnsFiltered.some(function(column) {
                        return permission[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }

            self.$set('permissions', filtered)
            // filtered = self.cervejarias.all;
            //
            // if(self.interaction.filterTerm != '' && self.interaction.columnsToFilter.length > 0)
            // {
            //     filtered = _.filter(self.cervejarias.all, function(cervejaria)
            //     {
            //         return self.interaction.columnsToFilter.some(function(column)
            //         {
            //             return cervejaria[column].toLowerCase().indexOf(self.interaction.filterTerm.toLowerCase()) > -1
            //         });
            //     });
            // }
            //
            // self.setPaginationData(filtered);
            //

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
        navigate (page){
            this.fetchPermission(page, this.showRow);
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

    computed() {
        // this.fetchPermission(1, this.showRow);
    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
    },
}
