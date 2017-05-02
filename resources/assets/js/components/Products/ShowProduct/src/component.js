import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'


export default{

    name: 'show-product',

    data(){
        return {
            newProduct: {
                id         : '',
                name       : '',
                price      : '',
                description: '',
                photo      : '',
                author      : '',
            },

            products: {},
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
            errors: [],


            deleteMultIten: [],
            allSelected: false,
            selected: [],
            sendEmployee: '',



        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchProduct(this.pagination.current_Page, this.showRow);

        var self = this
        jQuery(self.$els.productcols).select2({
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

        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (type in this.products) {
                    this.deleteMultIten.push(this.products[type].id);
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
            this.newProduct = {
                id         : '',
                name       : '',
                price      : '',
                description: '',
                photo      : '',
                author      : '',
            };
        },

        createProduct: function() {
            this.uploadsImages();
            var product = this.newProduct;
            //Clear form input

            this.$http.post('http://localhost:8000/api/v1/products/', product).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-product').modal('hide');
                    this.clearField();
                    this.fetchProduct(this.pagination.current_Page, this.showRow);
                    this.alert('Produto Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchProduct: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allProducts/'+row+'?page='+page).then((response) => {
                this.$set('products', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        canDeleteAll: function() {
            var prods = this.products;
            for (var prod in prods) {
                if (prods[prod].promotions.length > 0) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisProduct: function(id){
            this.$http.get('http://localhost:8000/api/v1/products/' + id).then((response) => {
                this.newProduct.id          = response.data.id;
                this.newProduct.name        = response.data.name;
                this.newProduct.price       = response.data.price;
                this.newProduct.description = response.data.description;
                this.newProduct.photo       = response.data.photo;
                this.newProduct.author      = response.data.author;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedProduct: function(id) {
            var product = this.newProduct;

            this.$http.patch('http://localhost:8000/api/v1/products/'+ id, product).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-product').modal('hide');
                    this.clearField();
                    // console.log(response.data);
                    this.fetchProduct(this.pagination.current_Page, this.showRow);
                    this.alert('Produto atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteProduct: function(id) {
            this.clearField();
            this.$http.delete('http://localhost:8000/api/v1/products/'+ id).then((response) => {
                $('#modal-delete-product').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchProduct(this.pagination.current_Page, this.showRow);
                    this.alert('Produto eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultProducts: function() {
            this.$http.delete('http://localhost:8000/api/v1/deleteMultProducts/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllProducts').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchProduct(this.pagination.current_page, this.showRow);
                    this.alert('Materiais eliminados com sucesso', 'warning');
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
                filtered = _.filter(self.all, function(product) {
                    return self.columnsFiltered.some(function(column) {
                        return product[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('products', filtered)
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
            this.fetchProduct(page, this.showRow);
        },

        uploadsImages: function() {
            var files = this.$els.productimage.files;
            var data = new FormData();
            data.append('productimage', files[0]);
            this.$http.post('http://localhost:8000/api/v1/productImageUpload/', data).then((response) => {
            }, (response) => {});
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
