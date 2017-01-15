export default{

    name: 'Component',

    data(){
        return {
            newUser                     : {
                name                    : '',
                username                : '',
                email                   : '',
                password                : '',
                // password_confirmation: '',
                gender                  : '',
                age                     : '',
                sland                   : '',
                council                 : '',
                parish                  : '',
                zone                    : '',
                type                    : '',
                status                  : '',
                bio                     : '',
                avatar                  : '',
            },
            errors                      : [],
            success                     : false
        }
    },


    ready () {
    },

    methods: {
        createUser: function() {
            //User input
            var user = this.newUser;

            //Clear form input
            this.newUser = {
                name                 : '',
                username             : '',
                email                : '',
                password             : '',
                // password_confirmation: '',
                gender               : '',
                age                  : '',
                sland                : '',
                council              : '',
                parish               : '',
                zone                 : '',
                type                 : '',
                status               : '',
                bio                  : '',
                avatar               : '',
            };
            this.$http.post('http://localhost:8000/api/v1/users/', user).then(response => {

                    //mostrar mensagem de sucesso!!
                    var self = this;
                    this.success = true;
                    setTimeout(function() {
                        self.success = false;
                    }, 5000);
                    // window.location = '/';
            })
            .catch(response => {
                if (typeof response.data === 'object') {
                    newUser.errors = _.flatten(_.toArray(response.data));
                } else {
                    newUser.errors = ['Algo esta errado verefique!!'];
                }
            });
        },
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

    components: {}
}
