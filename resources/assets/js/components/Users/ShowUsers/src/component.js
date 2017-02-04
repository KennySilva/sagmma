import Pagination from '../../../Pagination/src/Component.vue'

import { map } from 'lodash'
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
            pagination: {},
            success: false,
        }
    },


    methods: {

        // --------------------------------------------------------------------------------------------

        clearField: function(){
            this.newUser = {
                id          : '',
                name        : '',
                username    : '',
                ic          : '',
                email       : '',
                password    : '',
                gender      : '',
                age         : '',
                state       : '',
                council     : '',
                parish      : '',
                zone        : '',
                phone       : '',
                status      : '',
                type        : '',
                description : '',
                avatar      : '',
                roles       : [],
            };
        },

        

        createUser: function() {
            //User input
            var user = this.newUser;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/users/', user).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-user').modal('hide');
                    console.log(response.data);
                    this.fetchUser(this.pagination.last_Page);
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



        fetchUser: function(page) {
            var _this2 = this;
            this.$http.get('http://localhost:8000/api/v1/users?page='+page).then((response) => {
                _this2.$set('users', response.data.data);
                _this2.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------
        showThisUser: function(id) {
            this.$http.get('http://localhost:8000/api/v1/showThisUser/' + id).then((response) => {
                console.log('ritgth');
            }, (response) => {
                console.log('Error');
            });
        },


        getThisUser: function(id){
            this.$http.get('http://localhost:8000/api/v1/users/' + id).then((response) => {
                this.newUser.id          = response.data.id;
                this.newUser.name        = response.data.name;
                this.newUser.username    = response.data.username;
                this.newUser.ic          = response.data.ic;
                this.newUser.email       = response.data.email;
                this.newUser.gender      = response.data.gender;
                this.newUser.age         = response.data.age;
                this.newUser.state       = response.data.state;
                this.newUser.council     = response.data.council;
                this.newUser.parish      = response.data.parish;
                this.newUser.zone        = response.data.zone;
                this.newUser.phone       = response.data.phone;
                this.newUser.status      = response.data.status;
                this.newUser.type        = response.data.type;
                this.newUser.description = response.data.description;
                this.newUser.roles       = response.data.roles;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedUser: function(id) {
            var user = this.newUser;
            //Clear form input
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/users/'+ id, user).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-user').modal('hide');
                    // console.log(response.data);
                    this.fetchUser(this.pagination.current_page);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deleteUser: function(id) {
            var ConfirmBox = confirm("Tens certeza que queres Eliminar este usuario?");
            if (ConfirmBox) {
                this.$http.delete('http://localhost:8000/api/v1/users/'+ id).then((response) => {
                    $('#modal-delete-user').modal('hide');
                    if (response.status == 200) {
                        // console.log(response.data);
                        this.fetchUser();
                    }
                }, (response) => {
                    console.log("Ocorreu um erro na operação");
                });
            }
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
                console.log(response.status);
                console.log(response.data);
                if (response.status == 200) {
                    this.fetchUser(this.pagination.current_page);
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },


        // --------------------------------------------------------------------------------------------

        StatusStatus: function() {
            return this.users.status;
        },

        // --------------------------------------------------------------------------------------------

        alterAgeValue: function(users) {
            if (users == 'M') {
                return 'Masculino';
            }else if (users == 'F') {
                return 'Feminino';
            }else {
                return 'Outros';
            }

        },

        // --------------------------------------------------------------------------------------------

        alterTypeValue: function(users) {
            if (users == 'member') {
                return 'Membro';
            }else if (users == 'emp') {
                return 'Empregado';
            }else {
                return 'Comerciante';
            }

        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchUser(page);
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
        }

    },


    ready () {
        this.fetchUser(this.pagination.current_Page);
        this.roleUser();
    },

    computed: {
        myValidation: function() {
            return {
                name: !!this.newUser.name.trim(),
                username: !!this.newUser.username.trim(),
                email: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[ 0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.newUser.email),
            }
        },

        isValid: function() {
            var validation = this.validation;
            return Object.keys(validation).every(function(key){
                return validation[key];
            });
        }
    },


    components: {
        'Pagination': Pagination,
    }
}
