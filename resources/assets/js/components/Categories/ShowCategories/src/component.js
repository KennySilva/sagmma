import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-category',

    data(){
        return {
            newCategory: {
                id         : '',
                name       : '',
                description: '',
            },

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
        this.fetchCategory(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        clearField: function(){
            this.newCategory = {
                id         : '',
                name       : '',
                description: '',
            };
        },

        createCategory: function() {
            var category = this.newCategory;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/categories/', category).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-category').modal('hide');
                    this.fetchCategory();
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

        fetchCategory: function(page) {
            this.$http.get('http://localhost:8000/api/v1/categories?page='+page).then((response) => {
                this.$set('categories', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisCategory: function(id){
            this.$http.get('http://localhost:8000/api/v1/categories/' + id).then((response) => {
                this.newCategory.id       = response.data.id;
                this.newCategory.name     = response.data.name;
                this.newCategory.location = response.data.location;
                this.newCategory.description    = response.data.description;
                this.newCategory.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedCategory: function(id) {
            var category = this.newCategory;

            this.clearField();

            this.$http.patch('http://localhost:8000/api/v1/categories/'+ id, category).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-category').modal('hide');
                    // console.log(response.data);
                    this.fetchCategory();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteCategory: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/categories/'+ id).then((response) => {
                $('#modal-delete-category').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchCategory();
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
            this.fetchCategory(page);
        },



    },

    // ---------------------------------------------------------------------------------

    computed: {
    //     getThisCategory: function(id){
    //         this.$http.get('http://localhost:8000/api/v1/setPaginate/' + this.entries).then((response) => {
    //             this.fetchCategory(1);
    //         }, (response) => {
    //             console.log('Error');
    //         });
    //     },
    },

    // ---------------------------------------------------------------------------------

    components: {
        'Pagination': Pagination,
    },
}
