import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-article',

    data(){
        return {
            content: '<h2>I am Example</h2>',
            editorOption: {
                // something config
            },

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

            tags        : [],
            categories  : [],
            users       : [],
            openContents: [],
            sortColumn  : 'name',
            sortInverse : 1,
            filter      : {
                term    : ''
            },
            pagination  : {},
            success     : false,
        }
    },

    // ---------------------------------------------------------------------------------

    ready () {
        this.fetchArticle(1);
        this.articleCategory();
        this.articleTag();
        this.articleUser();
    },



    // ---------------------------------------------------------------------------------

    methods: {
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
            this.$http.post('http://localhost:8000/api/v1/articles/', article).then((response) => {
                if (response.status == 200) {

                    $('#modal-create-article').modal('hide');
                    // this.uploadsImages();
                    this.fetchArticle();
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

        fetchArticle: function(page) {
            var self = this;
            self.$http.get('http://localhost:8000/api/v1/articles?page='+page).then((response) => {
                self.$set('articles', response.data.data)
                self.$set('pagination', response.data)

                jQuery(self.$els.category).select2({
                    placeholder: "Catagerias",
                    allowClear: true,
                    theme: "classic",
                    width: '100%'
                }).on('change', function () {
                    self.$set('newArticle.category_id', jQuery(this).val());
                });

                jQuery(self.$els.tags).select2({
                    theme: "classic",
                    placeholder: "Marcadores",
                    allowClear: true,
                    width: '100%'
                }).on('change', function () {
                    self.$set('newArticle.tags', jQuery(this).val());
                });

            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisArticle: function(id){
            this.$http.get('http://localhost:8000/api/v1/articles/' + id).then((response) => {
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

            this.$http.patch('http://localhost:8000/api/v1/articles/'+ id, article).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-article').modal('hide');
                    // console.log(response.data);
                    this.fetchArticle();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteArticle: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/articles/'+ id).then((response) => {
                $('#modal-delete-article').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchArticle();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleTag: function() {
            this.$http.get('http://localhost:8000/api/v1/articleTag').then((response) => {
                this.$set('tags', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleCategory: function() {
            this.$http.get('http://localhost:8000/api/v1/articleCategory').then((response) => {
                this.$set('categories', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        articleUser: function() {
            this.$http.get('http://localhost:8000/api/v1/articleUser').then((response) => {
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
            this.$http.post('http://localhost:8000/api/v1/articleStatus/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchArticle(this.pagination.current_page);
                }
            }, (response) => {
            });
        },
        articleFeatures: function(articleFeatures) {
            var postData = {id: articleFeatures};
            this.$http.post('http://localhost:8000/api/v1/articleFeatures/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchArticle(this.pagination.current_page);
                }
            }, (response) => {
            });
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchArticle(page);
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

            this.$http.post('http://localhost:8000/api/v1/articleImageUpload/', data).then((response) => {
            }, (response) => {
            });

        },

        onEditorBlur(editor) {
            console.log('editor blur!', editor)
        },
        onEditorFocus(editor) {
            console.log('editor focus!', editor)
        },
        onEditorReady(editor) {
            console.log('editor ready!', editor)
        },
        onEditorChange({ editor, html, text }) {
            // console.log('editor change!', editor, html, text)
            this.content = html
        },
    },

    // ---------------------------------------------------------------------------------

    computed: {
        editor() {
            return this.$refs.myTextEditor.quillEditor
        }
    },

    // ---------------------------------------------------------------------------------
    mounted() {
        // you can use current editor object to do something(editor methods)
        console.log('this is my editor', this.editor)
        // this.editor to do something...
    },


    components: {
        'Pagination': Pagination,
        // quillEditor
    },
}
