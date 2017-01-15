import Pagination from '../../../Pagination/src/Component.vue'

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
            },

            products: {},
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
        this.fetchProduct(1);
    },

    // ---------------------------------------------------------------------------------

    methods: {
        createProduct: function() {
            var product = this.newProduct;

            //Clear form input
            this.newProduct = {
                id         : '',
                name       : '',
                price      : '',
                description: '',
                photo      : '',
            };
            this.$http.post('http://localhost:8000/api/v1/products/', product).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-product').modal('hide');
                    // console.log(response.data);
                    this.fetchProduct();
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

        fetchProduct: function(page) {
            this.$http.get('http://localhost:8000/api/v1/products?page='+page).then((response) => {
                this.$set('products', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisProduct: function(id){
            this.$http.get('http://localhost:8000/api/v1/products/' + id).then((response) => {
                this.newProduct.id          = response.data.id;
                this.newProduct.name        = response.data.name;
                this.newProduct.price        = response.data.price;
                this.newProduct.description = response.data.description;
                this.newProduct.photo       = response.data.photo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedProduct: function(id) {
            var product = this.newProduct;

            this.newProduct = {
                id         : '',
                name       : '',
                description: '',
                photo      : '',

            };

            this.$http.patch('http://localhost:8000/api/v1/products/'+ id, product).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-product').modal('hide');
                    // console.log(response.data);
                    this.fetchProduct();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteProduct: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/products/'+ id).then((response) => {
                $('#modal-delete-product').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchProduct();
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
            this.fetchProduct(page);
        },

        clearField: function(){
            this.newProduct = {
                id         : '',
                name       : '',
                description: '',
                photo      : '',

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
