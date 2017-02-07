import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-material',

    data(){
        return {
            newMaterial: {
                id         : '',
                name       : '',
                description: '',
            },

            materials: {},
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
        this.fetchMaterial(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        createMaterial: function() {
            var material = this.newMaterial;

            //Clear form input
            this.newMaterial = {
                id         : '',
                name       : '',
                description: '',
            };
            this.$http.post('http://localhost:8000/api/v1/materials/', material).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-material').modal('hide');
                    // console.log(response.data);
                    this.fetchMaterial();
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

        fetchMaterial: function(page) {
            this.$http.get('http://localhost:8000/api/v1/materials?page='+page).then((response) => {
                this.$set('materials', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisMaterial: function(id){
            this.$http.get('http://localhost:8000/api/v1/materials/' + id).then((response) => {
                this.newMaterial.id       = response.data.id;
                this.newMaterial.name     = response.data.name;
                this.newMaterial.location = response.data.location;
                this.newMaterial.description    = response.data.description;
                this.newMaterial.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedMaterial: function(id) {
            var material = this.newMaterial;

            this.newMaterial = {
                id         : '',
                name       : '',
                description: '',
            };

            this.$http.patch('http://localhost:8000/api/v1/materials/'+ id, material).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-material').modal('hide');
                    // console.log(response.data);
                    this.fetchMaterial();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteMaterial: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/materials/'+ id).then((response) => {
                $('#modal-delete-material').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchMaterial();
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
            this.fetchMaterial(page);
        },

        clearField: function(){
            this.newMaterial = {
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
