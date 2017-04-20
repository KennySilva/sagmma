import Pagination from '../../../Pagination/src/Component.vue'

import { map } from 'lodash'
import { _ } from 'lodash'

export default{
    name: 'ShowUser',

    data(){
        return {
            showColumn: {
                username  : '',
                gender    : '',
                age       : '',
                created_at: '',
                state     : '',
                council   : '',
                parish    : '',
            },
            newUser: {
                id                      : '',
                name                    : '',
                username                : '',
                ic                      : '',
                email                   : '',
                password                : '',
                gender                  : '',
                age                     : '',
                state                   : '',
                council                 : '',
                parish                  : '',
                zone                    : '',
                phone                   : '',
                status                  : '',
                type                    : '',
                description             : '',
                avatar                  : '',
                roles                   : [],
                // password_confirmation: '',
            },
            users: {},
            roles: [],
            openDetails: [],
            sortColumn: 'id',
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
            auth: [],
            errors: [],
        }
    },


    ready () {
        this.fetchUser(this.pagination.current_Page, this.showRow);
        this.roleUser();
        this.authUser();


        var self = this
        jQuery(self.$els.usercols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });

        jQuery(self.$els.typecreate).select2({
            placeholder: "Tipo",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newUser.type', jQuery(this).val());
        });


        jQuery(self.$els.rolescreate).select2({
            placeholder: "Função",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
            closeOnSelect: false,


        }).on('change', function () {
            self.$set('newUser.roles', jQuery(this).val());
        });


        jQuery(self.$els.typeedit).select2({
            placeholder: "Seleciona o tipo",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.type', jQuery(this).val());
        });


        jQuery(self.$els.rolesedit).select2({
            placeholder: "Função",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
            closeOnSelect: false,


        }).on('change', function () {
            self.$set('newUser.roles', jQuery(this).val());
        });

        jQuery(self.$els.statecreate).select2({
            placeholder: "Ilha",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.state', jQuery(this).val());
        });

        jQuery(self.$els.stateedit).select2({
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.state', jQuery(this).val());
        });

        jQuery(self.$els.councilcreate).select2({
            placeholder: "Concelho",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.council', jQuery(this).val());
        });

        jQuery(self.$els.counciledit).select2({
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.council', jQuery(this).val());
        });

        jQuery(self.$els.parishcreate).select2({
            placeholder: "Freguesia",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.parish', jQuery(this).val());
        });

        jQuery(self.$els.parishedit).select2({
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',


        }).on('change', function () {
            self.$set('newUser.parish', jQuery(this).val());
        });

    },


    methods: {

        // --------------------------------------------------------------------------------------------
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

            this.newUser = {
                id                      : '',
                name                    : '',
                username                : '',
                ic                      : '',
                email                   : '',
                password                : '',
                gender                  : '',
                age                     : '',
                state                   : '',
                council                 : '',
                parish                  : '',
                zone                    : '',
                phone                   : '',
                status                  : '',
                type                    : '',
                description             : '',
                avatar                  : '',
                roles                   : [],
            };
        },



        createUser: function() {
            //User input
            var user = this.newUser;
            this.$http.post('http://localhost:8000/api/v1/users/', user).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-user').modal('hide');
                    this.clearField();
                    console.log(response.data);
                    this.fetchUser(this.pagination.current_Page, this.showRow);
                    this.alert('Utilizador Criado com sucesso', 'success');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------



        fetchUser: function(page, row) {
            var self = this;
            this.$http.get('http://localhost:8000/api/v1/allUsers/'+row+'?page='+page).then((response) => {
                self.$set('users', response.data.data);
                self.$set('all', response.data.data);
                self.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        getThisUser: function(id){
            var self = this;

            this.clearField()
            self.$http.get('http://localhost:8000/api/v1/users/'+id).then((response) => {
                // var state = {Santiago: '1', Maio: '2', Fogo: '3', Brava: '4', SantoAntão: '5', SãoNiculau: '6', SãoVicente: '7', Sal: '8', Boavista: '9'};

                self.newUser.id          = response.data.id;
                self.newUser.name        = response.data.name;
                self.newUser.username    = response.data.username;
                self.newUser.ic          = response.data.ic;
                self.newUser.email       = response.data.email;
                self.newUser.password    = '00000000';
                self.newUser.gender      = response.data.gender;
                self.newUser.age         = response.data.age;
                self.newUser.state       = response.data.state;
                self.newUser.council     = response.data.council;
                self.newUser.parish      = response.data.parish;
                self.newUser.zone        = response.data.zone;
                self.newUser.phone       = response.data.phone;
                self.newUser.status      = response.data.status;
                self.newUser.type        = response.data.type;
                self.newUser.description = response.data.description;
                self.newUser.avatar      = response.data.avatar;
                var roles = response.data.roles;
                for (var variable in roles) {
                    self.newUser.roles.push(roles[variable].id)
                }
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedUser: function(id) {
            var user = this.newUser;
            //Clear form input
            this.$http.patch('http://localhost:8000/api/v1/users/'+ id, user).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-user').modal('hide');
                    this.clearField();
                    // console.log(response.data);
                    this.fetchUser(this.pagination.current_page, this.showRow);
                    this.alert('Utilizador atualizado com sucesso', 'info');
                    this.$set('errors', '')
                }
            }, (response) => {
                this.$set('errors', response.data)
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteUser: function(id) {
            // var ConfirmBox = confirm("Eliminar?");
            // if (ConfirmBox) {
            this.$http.delete('http://localhost:8000/api/v1/users/'+ id).then((response) => {
                $('#modal-delete-user').modal('hide');
                if (response.status == 200) {
                    this.fetchUser(this.pagination.current_page, this.showRow);
                    this.alert('Utilizador eliminado com sucesso', 'warning');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
            // }
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        roleUser: function() {
            this.$http.get('http://localhost:8000/api/v1/roleuser').then((response) => {
                this.$set('roles', response.data);
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
            // console.log(ev);
        },

        // --------------------------------------------------------------------------------------------

        estado_utilizador: function(userStatus) {
            var postData = {id: userStatus};
            this.$http.post('http://localhost:8000/api/v1/estado_utilizador/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchUser(this.pagination.current_page, this.showRow);
                    this.alert('Estado do Utilizador Atualiazado', 'info');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        authUser: function() {
            this.$http.get('http://localhost:8000/api/v1/authUser').then((response) => {
                this.$set('auth', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        // --------------------------------------------------------------------------------------------

        StatusStatus: function() {
            return this.users.status;
        },


        doFilter: function() {

            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(user) {
                    return self.columnsFiltered.some(function(column) {
                        return user[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('users', filtered)
        },


        // Outros funções
        navigate (page) {
            this.fetchUser(page, this.showRow);
        },

        doOpenDetails: function(ev, id)
        {
            ev.preventDefault();
            var self = this,
            index = self.openDetails.indexOf(id);
            if(index > -1)
            {
                self.openDetails.$remove(id);
            } else {
                self.openDetails.push(id);
            }
        },

        openAllDetails: function(ev)
        {
            ev.preventDefault();

            var self = this;
            if (self.openDetails.length > 0) {
                self.$set('openDetails', []);
            }else {
                self.$set('openDetails', map(self.users, 'id'));
            }
        },


    },



    // computed: {
    //     myValidation: function() {
    //         return {
    //             name: !!this.newUser.name.trim(),
    //             username: !!this.newUser.username.trim(),
    //             email: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[ 0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.newUser.email),
    //         }
    //     },
    //
    //     isValid: function() {
    //         var validation = this.validation;
    //         return Object.keys(validation).every(function(key){
    //             return validation[key];
    //         });
    //     },
    // },




    components: {
        'Pagination': Pagination,
    },

}
