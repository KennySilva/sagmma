import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'
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
                traders: [],
                type: [],
            },

            places  : {},
            types      : [],


            sortColumn : 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            columnsFiltered: [],
            pagination     : {},
            success        : false,
            msgSucess      : '',
            typeAlert      : '',
            showRow        : '',
            all            : {},
            // auth           : [],
            errors         : [],

            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendPlace: '',
        }
    },


    ready () {
        this.fetchPlace(this.pagination.current_Page, this.showRow)
        this.placeType()
        // this.authUser();

        var self = this
        jQuery(self.$els.placecols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });

        jQuery(self.$els.createplace).select2({
            placeholder: "Tipo",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPlace.typeofplace_id', jQuery(this).val());
        });

        jQuery(self.$els.editplace).select2({
            placeholder: "Tipo",
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPlace.typeofplace_id', jQuery(this).val());
        });
    },


    methods: {

        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (place in this.places) {
                    this.deleteMultIten.push(this.places[place].id);
                }
            }
        },


        alert: function(msg, typeAlert) {
            var self = this;
            this.success = true;
            this.msgSucess = msg;
            this.typeAlert = typeAlert;


            setTimeout(function() {
                self.success = false;
            }, 5000);
        },


        clearField: function(){
            this.newPlace = {
                name            : '',
                price           : '',
                dimension       : '',
                status          : '',
                typeofplace_id : '',
                description     : '',
                traders: [],
                type: [],

            };
        },

        // --------------------------------------------------------------------------------------------

        createPlace: function() {
            //Place input
            var place = this.newPlace;

            //Clear form input
            this.clearField();
            this.$http.post('/api/v1/places/', place).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-place').modal('hide');
                    console.log(response.data);
                    this.fetchPlace(this.pagination.current_Page, this.showRow);
                    this.alert('Espaço Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchPlace: function(page, row) {
            this.$http.get('/api/v1/allPlaces/'+row+'?page='+page).then((response) => {
                this.$set('places', response.data.data);
                this.$set('all', response.data.data);
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        canDeleteAll: function() {
            var places = this.places;
            for (var place in places) {
                if (places[place].taxation != null || places[place].contract != null) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisPlace: function(id){
            this.$http.get('/api/v1/places/' + id).then((response) => {
                this.newPlace.id             = response.data.id;
                this.newPlace.name           = response.data.name;
                this.newPlace.price          = response.data.price;
                this.newPlace.dimension      = response.data.dimension;
                this.newPlace.status         = response.data.status;
                this.newPlace.typeofplace_id = response.data.typeofplace_id;
                this.newPlace.description    = response.data.description;
                this.newPlace.traders    = response.data.traders;
                this.newPlace.type       = response.data.typeofplace;
            }, (response) => {
                console.log('Error');
            });
        },

        undelete_alert: function() {
            $.alert({
                icon: 'fa fa-exclamation-triangle',
                title: 'Ação Crítico',
                content: 'Informação realacionada com a Integridade de outros dados!!',
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedPlace: function(id) {
            var place = this.newPlace;
            this.clearField();
            this.$http.patch('/api/v1/places/'+ id, place).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-place').modal('hide');
                    // console.log(response.data);
                    this.fetchPlace(this.pagination.current_Page, this.showRow);
                    this.alert('Estaço atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------


        deletePlace: function(id) {
            this.$http.delete('/api/v1/places/'+ id).then((response) => {
                $('#modal-delete-place').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchPlace(this.pagination.current_Page, this.showRow);
                    this.alert('Estaço eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultPlace: function() {
            this.$http.delete('/api/v1/deleteMultPlaces/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAll').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchPlace(this.pagination.current_page, this.showRow);
                    this.alert('Funcionários eliminados com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        placeType: function() {
            this.$http.get('/api/v1/placeType').then((response) => {
                this.$set('types', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },
        //
        //
        // authUser: function() {
        //     this.$http.get('/api/v1/authUser').then((response) => {
        //         this.$set('auth', response.data);
        //     }, (response) => {
        //         console.log("Ocorreu um erro na operação");
        //     });
        // },


        // -------------------------Metodo de suporte---------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(place) {
                    return self.columnsFiltered.some(function(column) {
                        return place[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('places', filtered)
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
            // console.log(ev);
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchPlace(page, this.showRow);
        },


    },



    components: {
        'Pagination': Pagination,
    }
}
