import vSelect from 'vue-select'
import Pagination from '../../../Pagination/src/Component.vue'


export default{

    name: 'show-taxation',

    data(){
        return {
            newTaxation: {
                id          : '',
                employee_id : '',
                place_id    : '',
                income      : '',
                type        : '',
                created_at  : '',
            },

            taxations : {},
            employees: [],
            places: [],

            sortColumn : 'id',
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
        this.fetchTaxation(1);
        this.taxationEmployee();
        this.taxationPlace();
        // this.getPlaces();
    },

    // ---------------------------------------------------------------------------------

    methods: {

        clearField: function(){
            this.newTaxation = {
                id          : '',
                employee_id : '',
                place_id : '',
                income : '',
                type : '',
            };
        },


        createTaxation: function() {
            var taxation = this.newTaxation;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/taxations/', taxation).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-taxation').modal('hide');
                    this.fetchTaxation();
                    console.log('correu bem');
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

        fetchTaxation: function(page) {
            this.$http.get('http://localhost:8000/api/v1/taxations?page='+page).then((response) => {
                this.$set('taxations', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTaxation: function(id){
            this.$http.get('http://localhost:8000/api/v1/taxations/' + id).then((response) => {
                this.newTaxation.id          = response.data.id;
                this.newTaxation.employee_id = response.data.employee_id;
                this.newTaxation.place_id    = response.data.place_id;
                this.newTaxation.income      = response.data.income;
                this.newTaxation.type        = response.data.type;
                this.newTaxation.created_at        = response.data.created_at;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTaxation: function(id) {
            var taxation = this.newTaxation;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/taxations/'+ id, taxation).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-taxation').modal('hide');
                    // console.log(response.data);
                    this.fetchTaxation();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTaxation: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/taxations/'+ id).then((response) => {
                $('#modal-delete-taxation').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTaxation();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        taxationPlace: function() {
            this.$http.get('http://localhost:8000/api/v1/taxationPlace').then((response) => {
                this.$set('places', response.data);
                // this.$set('options', response.data.name);
                // this.options = response.data.items
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        taxationEmployee: function() {
            this.$http.get('http://localhost:8000/api/v1/taxationEmployee').then((response) => {
                this.$set('employees', response.data);
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
            this.fetchTaxation(page);
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
