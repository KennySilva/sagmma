import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-tag',

    data(){
        return {
            newTag: {
                id         : '',
                name       : '',
                description: '',
            },
            tags: {},
            all: {},
            sortColumn: 'name',
            sortInverse: 1,
            filter: {
                term: ''
            },
            columnsTagToFilter: [],
            pagination: {},
            success: false,
            msgSucess: '',
            typeAlert: '',
            showRow: '',
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchTag(1, this.showRow);
        var self = this
        jQuery(self.$els.coltag).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsTagToFilter', jQuery(this).val());
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
            this.newTag = {
                id         : '',
                name       : '',
                description: '',
            };
        },

        createTag: function() {
            var tag = this.newTag;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/tags/', tag).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-tag').modal('hide');
                    this.fetchTag(1, this.showRow);
                    this.alert('Marcador Criado com sucesso', 'success');

                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchTag: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allTags/'+row+'?page='+page).then((response) => {
                this.$set('tags', response.data.data)
                this.$set('all', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisTag: function(id){
            this.$http.get('http://localhost:8000/api/v1/tags/' + id).then((response) => {
                this.newTag.id       = response.data.id;
                this.newTag.name     = response.data.name;
                this.newTag.location = response.data.location;
                this.newTag.description    = response.data.description;
                this.newTag.logo   = response.data.logo;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedTag: function(id) {
            var tag = this.newTag;

            this.clearField();

            this.$http.patch('http://localhost:8000/api/v1/tags/'+ id, tag).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-tag').modal('hide');
                    // console.log(response.data);
                    this.fetchTag(1, this.showRow);
                    this.alert('Marcador atualizado com sucesso', 'info');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteTag: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/tags/'+ id).then((response) => {
                $('#modal-delete-tag').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchTag(1, this.showRow);
                    this.alert('Maracdor eliminado com sucesso', 'warning');

                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------
        doFilter: function() {

            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsTagToFilter.length > 0) {
                filtered = _.filter(self.all, function(tag) {
                    return self.columnsTagToFilter.some(function(column) {
                        return tag[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('tags', filtered)
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
            this.fetchTag(page, this.showRow);
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
