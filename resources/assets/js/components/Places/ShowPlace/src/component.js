import Pagination from '../../../Pagination/src/Component.vue'
// import vSelect from "vue-select"
export default{
    name: 'ShowPlaces',


    data(){
        return {
            showColumn: {
                ic: '',
                typeofplace_id: '',
            },
            newPlace: {
                id            : '',
                name            : '',
                price           : '',
                dimension       : '',
                status          : '',
                typeofplace_id : '',
                description     : '',
            },


            places  : {},
            types      : [],


            sortColumn : 'name',
            sortInverse: 1,
            filter     : {
                term   : ''
            },
            pagination : {},
            success    : false,
        }
    },


    methods: {
        clearField: function(){
            this.newPlace = {
                name            : '',
                price           : '',
                dimension       : '',
                status          : '',
                typeofplace_id : '',
                description     : '',
            };
        },

        // --------------------------------------------------------------------------------------------

        createPlace: function() {
            //Place input
            var place = this.newPlace;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/places/', place).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-place').modal('hide');
                    console.log(response.data);
                    this.fetchPlace(this.pagination.last_Page);
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

        fetchPlace: function(page) {
            this.$http.get('http://localhost:8000/api/v1/places?page='+page).then((response) => {
                this.$set('places', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisPlace: function(id){
            this.$http.get('http://localhost:8000/api/v1/places/' + id).then((response) => {
                this.newPlace.id             = response.data.id;
                this.newPlace.name           = response.data.name;
                this.newPlace.price          = response.data.price;
                this.newPlace.dimension      = response.data.dimension;
                this.newPlace.status         = response.data.status;
                this.newPlace.typeofplace_id = response.data.typeofplace_id;
                this.newPlace.description    = response.data.description;
                // this.newPlace.typename       = response.data.typeofplace.name;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedPlace: function(id) {
            var place = this.newPlace;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/places/'+ id, place).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-place').modal('hide');
                    // console.log(response.data);
                    this.fetchPlace(this.pagination.current_page);

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deletePlace: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/places/'+ id).then((response) => {
                $('#modal-delete-place').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchPlace();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        placeType: function() {
            this.$http.get('http://localhost:8000/api/v1/placeType').then((response) => {
                this.$set('types', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        placeStatus: function(placeStatus) {
            var postData = {id: placeStatus};

            this.$http.post('http://localhost:8000/api/v1/placeStatus/', postData).then((response) => {
                console.log(response.status);
                console.log(response.data);
                if (response.status == 200) {
                    this.fetchPlace(this.pagination.current_page);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------

        doSort: function(ev, column) {
            var self = this;
            ev.preventDefault()
            self.sortColumn = column;
            if (self.sortInverse == 1) {
                self.sortInverse = -1
            }else {
                self.sortInverse = 1
            }
            // console.log(ev);
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchPlace(page);
        },


    },


    ready () {
        this.fetchPlace(this.pagination.current_Page)
        this.placeType()

    },


    components: {
        'Pagination': Pagination,
    }
}
