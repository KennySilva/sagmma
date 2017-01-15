import Pagination from '../../../Pagination/src/Component.vue'

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
            pagination: {},
            success: false,
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTypeofemployee(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        createTypeofemployee: function() {
            var typeofemployee = this.newTypeofemployee;

            //Clear form input
            this.newTypeofemployee = {
                id         : '',
                name       : '',
                description: '',
            };

            this.$http.post('http://localhost:8000/api/v1/typeofemployees/', typeofemployee).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-typeofemployee').modal('hide');
                    // console.log(response.data);
                    this.fetchTypeofemployee();
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

        fetchTypeofemployee: function(page) {
            this.$http.get('http://localhost:8000/api/v1/typeofemployees?page='+page).then((response) => {
                this.$set('typeofemployees', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
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

            this.newTypeofemployee = {
                id         : '',
                name       : '',
                description: '',
            };

            this.$http.patch('http://localhost:8000/api/v1/typeofemployees/'+ id, typeofemployee).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-typeofemployee').modal('hide');
                    // console.log(response.data);
                    this.fetchTypeofemployee();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTypeofemployee: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/typeofemployees/'+ id).then((response) => {
                $('#modal-delete-typeofemployee').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTypeofemployee();
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
            this.fetchTypeofemployee(page);
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
