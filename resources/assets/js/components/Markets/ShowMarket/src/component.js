import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'ShowMarket',

    data(){
        return {

            newMarket: {
                id         : '',
                name       : '',
                location   : '',
                description: '',
                logo       : ''
            },

            markets: {},
            sortColumn: 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            submited: false,
            errors: [],
            pagination: {},
            success: false,
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchMarket(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        clearField: function(){
            this.newMarket = {
                id         : '',
                name       : '',
                location   : '',
                description: '',
                logo       : ''
            };
        },

        createMarket: function() {
            var market = this.newMarket;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/markets/', market).then((response) => {

                $('#modal-create-market').modal('hide');

                this.fetchMarket();
                var self = this;
                this.success = true;
                setTimeout(function() {
                    self.success = false;
                }, 5000);

                // clear previous form errors
                this.$set('errors', '');

                this.submited = true;
            }, (response) => {
                this.$set('errors', response.data);
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchMarket: function(page) {
            this.$http.get('http://localhost:8000/api/v1/markets?page='+page).then((response) => {
                this.$set('markets', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisMarket: function(id){
            this.$http.get('http://localhost:8000/api/v1/markets/' + id).then((response) => {
                this.newMarket.id          = response.data.id;
                this.newMarket.name        = response.data.name;
                this.newMarket.location    = response.data.location;
                this.newMarket.description = response.data.description;
                this.newMarket.logo        = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedMarket: function(id) {
            var market = this.newMarket;

            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/markets/'+ id, market).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-market').modal('hide');
                    // console.log(response.data);
                    this.fetchMarket();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteMarket: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/markets/'+ id).then((response) => {
                $('#modal-delete-market').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchMarket();
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
            this.fetchMarket(page);
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
