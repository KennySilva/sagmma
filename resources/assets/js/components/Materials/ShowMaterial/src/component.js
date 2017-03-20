import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-material',

    data(){
        return {
            newMaterial: {
                id         : '',
                name       : '',
                description: '',
            },

            materials: {},
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

        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchMaterial(this.pagination.current_Page, this.showRow);
        var self = this
        jQuery(self.$els.materialcols).select2({
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

        createMaterial: function() {
            var material = this.newMaterial;

            //Clear form input
            this.clearField();

            this.$http.post('http://localhost:8000/api/v1/materials/', material).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-material').modal('hide');
                    // console.log(response.data);
                    this.fetchMaterial(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário Criado com sucesso', 'success');

                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchMaterial: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allMaterials/'+row+'?page='+page).then((response) => {
                this.$set('materials', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisMaterial: function(id){
            this.$http.get('http://localhost:8000/api/v1/materials/' + id).then((response) => {
                this.newMaterial.id       = response.data.id;
                this.newMaterial.name     = response.data.name;
                this.newMaterial.location = response.data.location;
                this.newMaterial.description    = response.data.description;
                this.newMaterial.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedMaterial: function(id) {
            var material = this.newMaterial;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/materials/'+ id, material).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-material').modal('hide');
                    // console.log(response.data);
                    this.fetchMaterial();
                    this.alert('Tipo de Funcionário atualizado com sucesso', 'info');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteMaterial: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/materials/'+ id).then((response) => {
                $('#modal-delete-material').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchMaterial(this.pagination.current_Page, this.showRow);
                    this.alert('Tipo de Funcionário eliminado com sucesso', 'warning');

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
                filtered = _.filter(self.all, function(material) {
                    return self.columnsFiltered.some(function(column) {
                        return material[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('materials', filtered)
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
            this.fetchMaterial(page, this.showRow);
        },

        clearField: function(){
            this.newMaterial = {
                id         : '',
                name       : '',
                description: '',
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
