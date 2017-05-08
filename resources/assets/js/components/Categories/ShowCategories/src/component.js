import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

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
            columnsFiltered: [],
            pagination: {},
            success: false,
            msgSucess: '',
            typeAlert: '',
            showRow: '',
            all: {},
            categories: {},
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchCategory(1, this.showRow);
        var self = this
        jQuery(self.$els.colcat).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set(columnsFiltered, jQuery(this).val());
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
            this.$http.post('/api/v1/categories/', category).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-category').modal('hide');
                    this.fetchCategory(1, this.showRow);
                    this.alert('Categoria Criado com sucesso', 'success');
                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchCategory: function(page, row) {
            this.$http.get('/api/v1/allCategories/'+row+'?page='+page).then((response) => {
                this.$set('categories', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisCategory: function(id){
            this.$http.get('/api/v1/categories/' + id).then((response) => {
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

            this.$http.patch('/api/v1/categories/'+ id, category).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-category').modal('hide');
                    // console.log(response.data);
                    this.fetchCategory(1, this.showRow);
                        this.alert('Categoria atualizado com sucesso', 'info');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteCategory: function(id) {
            this.$http.delete('/api/v1/categories/'+ id).then((response) => {
                $('#modal-delete-category').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchCategory(1, this.showRow);
                    this.alert('Categoria eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        doFilter: function() {

            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(category) {
                    return self.columnsFiltered.some(function(column) {
                        return category[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('categories', filtered)
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
        navigate (page) {
            this.fetchCategory(page, this.showRow);
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
