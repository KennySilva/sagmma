import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'

export default{

    name: 'show-article',

    data(){
        return {
            newArticle: {
                id         : '',
                title      : '',
                content    : '',
                status     : '',
                featured   : '',
                user_id    : '',

                category_id: '',
                tags       : [],

            },

            articles: {},
            tags        : [],
            categories  : [],
            users       : [],
            openContents: [],
            sortColumn  : 'name',
            sortInverse : 1,
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
        this.fetchArticle(1, this.showRow);
        this.articleCategory();
        this.articleTag();
        this.articleUser();
        var self = this
        jQuery(self.$els.article).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });


        jQuery(self.$els.categorycreate).select2({
            placeholder: "Categoria",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newArticle.category_id', jQuery(this).val());
        });

        jQuery(self.$els.tagscreate).select2({
            placeholder: "Marcadores",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newArticle.tags', jQuery(this).val());
        });
        //-----------------------------------------------------------------------------------
        jQuery(self.$els.categoryedit).select2({
            placeholder: "Categorias",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newArticle.category_id', jQuery(this).val());
        });

        jQuery(self.$els.tagsedit).select2({
            placeholder: "Marcadores",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newArticle.tags', jQuery(this).val());
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
            this.newArticle = {
                id         : '',
                title      : '',
                content    : '',
                status     : '',
                featured   : '',
                user_id    : '',
                category_id: '',
                tags       : [],

            };
        },

        createArticle: function() {
            this.uploadsImages();
            var article = this.newArticle;
            // Clear form input
            this.clearField();
            this.$http.post('/api/v1/articles/', article).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-article').modal('hide');
                    // this.uploadsImages();
                    this.fetchArticle(1, this.showRow);
                    this.alert('Artigo Criado com sucesso', 'success');
                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------

        fetchArticle: function(page, row) {
            var self = this;
            self.$http.get('/api/v1/allArticles/'+row+'?page='+page).then((response) => {
                self.$set('articles', response.data.data)
                self.$set('all', response.data.data)
                self.$set('pagination', response.data)


            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisArticle: function(id){
            this.$http.get('/api/v1/articles/' + id).then((response) => {
                this.newArticle.id          = response.data.id;
                this.newArticle.title       = response.data.title;
                this.newArticle.content     = response.data.content;
                this.newArticle.status      = response.data.status;
                this.newArticle.featured    = response.data.featured;
                this.newArticle.user_id     = response.data.user_id;
                this.newArticle.category_id = response.data.category_id;
                this.newArticle.tags = response.data.tags;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedArticle: function(id) {
            var article = this.newArticle;

            this.clearField();

            this.$http.patch('/api/v1/articles/'+ id, article).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-article').modal('hide');
                    // console.log(response.data);
                    this.fetchArticle(1, this.showRow);
                    this.alert('Artigo atualizado com sucesso', 'info');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteArticle: function(id) {
            this.$http.delete('/api/v1/articles/'+ id).then((response) => {
                $('#modal-delete-article').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchArticle(1, this.showRow);
                    this.alert('Artigo eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleTag: function() {
            this.$http.get('/api/v1/articleTag').then((response) => {
                this.$set('tags', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleCategory: function() {
            this.$http.get('/api/v1/articleCategory').then((response) => {
                this.$set('categories', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleUser: function() {
            this.$http.get('/api/v1/articleUser').then((response) => {
                this.$set('users', response.data);
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

        articleStatus: function(articleStatus) {
            var postData = {id: articleStatus};
            this.$http.post('/api/v1/articleStatus/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchArticle(this.pagination.current_page, this.showRow);
                }
            }, (response) => {
            });
        },
        articleFeatures: function(articleFeatures) {
            var postData = {id: articleFeatures};
            this.$http.post('/api/v1/articleFeatures/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchArticle(this.pagination.current_page, this.showRow);
                }
            }, (response) => {
            });
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchArticle(page, this.showRow);
        },
        doOpenContents: function(ev, id)
        {
            ev.preventDefault();
            var self = this,
            index = self.openContents.indexOf(id);
            if(index > -1)
            {
                self.openContents.$remove(id);
            } else {
                self.openContents.push(id);
            }
        },

        openAllContents: function(ev)
        {
            ev.preventDefault();

            var self = this;
            if (self.openContents.length > 0) {
                self.$set('openContents', []);
            }else {
                self.$set('openContents', map(self.articles, 'id'));
            }
        },
        // Metodos auxiliares
        uploadsImages: function() {
            // ev.preventDefault();
            var files = this.$els.articleimage.files;
            var data = new FormData();
            data.append('articleimage', files[0]);

            this.$http.post('/api/v1/articleImageUpload/', data).then((response) => {
            }, (response) => {
            });

        },


        doFilter: function() {

            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(article) {
                    return self.columnsFiltered.some(function(column) {
                        return article[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('articles', filtered)
        },
    },



    // ---------------------------------------------------------------------------------



    components: {
        'Pagination': Pagination,
        // quillEditor
    },
}
