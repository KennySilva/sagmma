import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-tag',

    data(){
        return {
            newTag: {
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
        this.fetchTag(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        clearField: function(){
            this.newTag = {
                id         : '',
                name       : '',
                description: '',
            };
        },

        createTag: function() {
            var tag = this.newTag;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/tags/', tag).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-tag').modal('hide');
                    this.fetchTag();
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

        fetchTag: function(page) {
            this.$http.get('http://localhost:8000/api/v1/tags?page='+page).then((response) => {
                this.$set('tags', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTag: function(id){
            this.$http.get('http://localhost:8000/api/v1/tags/' + id).then((response) => {
                this.newTag.id       = response.data.id;
                this.newTag.name     = response.data.name;
                this.newTag.location = response.data.location;
                this.newTag.description    = response.data.description;
                this.newTag.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTag: function(id) {
            var tag = this.newTag;

            this.clearField();

            this.$http.patch('http://localhost:8000/api/v1/tags/'+ id, tag).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-tag').modal('hide');
                    // console.log(response.data);
                    this.fetchTag();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTag: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/tags/'+ id).then((response) => {
                $('#modal-delete-tag').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTag();
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
            this.fetchTag(page);
        },



    },

    // ---------------------------------------------------------------------------------

    computed: {
    //     getThisTag: function(id){
    //         this.$http.get('http://localhost:8000/api/v1/setPaginate/' + this.entries).then((response) => {
    //             this.fetchTag(1);
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
