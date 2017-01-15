import Pagination from '../../../Pagination/src/Component.vue'

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
            pagination: {},
            success: false,
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTypeofplace(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        createTypeofplace: function() {
            var typeofplace = this.newTypeofplace;

            //Clear form input
            this.newTypeofplace = {
                id         : '',
                name       : '',
                description: '',
            };
            this.$http.post('http://localhost:8000/api/v1/typeofplaces/', typeofplace).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-typeofplace').modal('hide');
                    this.fetchTypeofplace();
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

        fetchTypeofplace: function(page) {
            this.$http.get('http://localhost:8000/api/v1/typeofplaces?page='+page).then((response) => {
                this.$set('typeofplaces', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTypeofplace: function(id){
            this.$http.get('http://localhost:8000/api/v1/typeofplaces/' + id).then((response) => {
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

            this.newTypeofplace = {
                id         : '',
                name       : '',
                description: '',
            };

            this.$http.patch('http://localhost:8000/api/v1/typeofplaces/'+ id, typeofplace).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-typeofplace').modal('hide');
                    // console.log(response.data);
                    this.fetchTypeofplace();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },
        
        // --------------------------------------------------------------------------------------------

        deleteTypeofplace: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/typeofplaces/'+ id).then((response) => {
                $('#modal-delete-typeofplace').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTypeofplace();
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
            this.fetchTypeofplace(page);
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
