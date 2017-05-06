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
            columnsFiltered: ['name'],
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
        selectAll: function() {
            this.deleteMultIten = [];
            if (!this.allSelected) {
                for (type in this.materials) {
                    this.deleteMultIten.push(this.materials[type].id);
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
            this.$http.post('/api/v1/materials/', material).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-material').modal('hide');
                    this.clearField();
                    // console.log(response.data);
                    this.fetchMaterial(this.pagination.current_Page, this.showRow);
                    this.alert('Material Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        fetchMaterial: function(page, row) {
            this.$http.get('/api/v1/allMaterials/'+row+'?page='+page).then((response) => {
                this.$set('materials', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        canDeleteAll: function() {
            var mats = this.materials;
            for (var mat in mats) {
                if (mats[mat].employees.length > 0) {
                    return true;
                }
            }
        },

        // --------------------------------------------------------------------------------------------

        getThisMaterial: function(id){
            this.$http.get('/api/v1/materials/' + id).then((response) => {
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
            this.$http.patch('/api/v1/materials/'+ id, material).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-material').modal('hide');
                    this.clearField();
                    // console.log(response.data);
                    this.fetchMaterial(this.pagination.current_Page, this.showRow);
                    this.alert('Material atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteMaterial: function(id) {
            this.$http.delete('/api/v1/materials/'+ id).then((response) => {
                $('#modal-delete-material').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchMaterial(this.pagination.current_Page, this.showRow);
                    this.alert('Material eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        deleteMultMaterials: function() {
            this.$http.delete('/api/v1/deleteMultMaterials/'+ this.deleteMultIten).then((response) => {
                if (response.status == 200) {
                    $('#deleteAllMaterials').modal('hide');
                    this.deleteMultIten  = [];
                    this.fetchMaterial(this.pagination.current_page, this.showRow);
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

        undelete_alert: function() {
            $.alert({
                icon: 'fa fa-exclamation-triangle',
                title: 'Ação Crítico',
                content: 'Informação realacionada com a Integridade de outros dados!!',
            });
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
