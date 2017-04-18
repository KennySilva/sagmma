import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'


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
            all: {},
            sortColumn: 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            submited: false,
            errors: [],
            pagination: {},
            success: false,
            showRow: '',
            columnsFiltered: ['name'],
            msgSucess: '',
            typeAlert: '',
            errors: [],
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchMarket(this.pagination.current_Page, this.showRow);
        var self = this
        jQuery(self.$els.colmarket).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
    },

    // ---------------------------------------------------------------------------------

    methods: {
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
            this.$http.post('http://localhost:8000/api/v1/markets/', market).then((response) => {
                $('#modal-create-market').modal('hide');
                this.clearField();
                this.fetchMarket(this.pagination.current_Page, this.showRow);

                this.alert('Mercado Criado com sucesso', 'success');
                this.$set('errors', '')

        }, (response) => {
            this.$set('errors', response.data)
        });
    },

    // --------------------------------------------------------------------------------------------

    fetchMarket: function(page, row) {
        this.$http.get('http://localhost:8000/api/v1/getAllMarkets/'+row+'?page='+page).then((response) => {
            this.$set('markets', response.data.data)
            this.$set('all', response.data.data)
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

        this.$http.patch('http://localhost:8000/api/v1/markets/'+ id, market).then((response) => {
            if (response.status == 200) {
                $('#modal-edit-market').modal('hide');
                this.clearField();
                this.fetchMarket(this.pagination.current_Page, this.showRow);
                this.alert('Mercado atualizado com sucesso', 'info');
                this.$set('errors', '')
            }
        }, (response) => {
            this.$set('errors', response.data)
        });
    },

    // --------------------------------------------------------------------------------------------

    deleteMarket: function(id) {
        this.$http.delete('http://localhost:8000/api/v1/markets/'+ id).then((response) => {
            $('#modal-delete-market').modal('hide');
            if (response.status == 200) {
                this.fetchMarket(this.pagination.current_Page, this.showRow);
                this.alert('Mercado eliminado com sucesso', 'warning');
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

    doFilter: function() {
        var self = this
        filtered = self.all
        if (self.filter.term != '' && self.columnsFiltered.length > 0) {
            filtered = _.filter(self.all, function(market) {
                return self.columnsFiltered.some(function(column) {
                    return market[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                })
            })
        }
        self.$set('markets', filtered)
    },

    // --------------------------------------------------------------------------------------------

    // Outros funções
    navigate (page) {
        this.fetchMarket(page, this.showRow);
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
