import Pagination from '../../../Pagination/src/Component.vue'

export default{

    name: 'show-control',

    data(){
        return {
            newControl: {
                id          : '',
                employee_id : '',
                material_id : '',
                status      : '',
            },

            controls : {},
            employees: [],
            materials: [],

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
        this.fetchControl(1);
        this.controlEmployee();
        this.controlMaterial();
    },

    // ---------------------------------------------------------------------------------

    methods: {
        clearField: function(){
            this.newControl = {
                id          : '',
                employee_id : '',
                material_id : '',
                status      : '',
            };
        },


        createControl: function() {
            var control = this.newControl;

            //Clear form input
            this.clearField();
            this.$http.post('http://localhost:8000/api/v1/controls/', control).then((response) => {
                if (response.status == 200) {
                    $('#modal-create-control').modal('hide');
                    this.fetchControl();
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

        fetchControl: function(page) {
            this.$http.get('http://localhost:8000/api/v1/controls?page='+page).then((response) => {
                this.$set('controls', response.data.data)
                this.$set('pagination', response.data)
            }, (response) => {
                console.log("Ocorreu um erro na operação")
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisControl: function(id){
            this.$http.get('http://localhost:8000/api/v1/controls/' + id).then((response) => {
                this.newControl.id          = response.data.id;
                this.newControl.employee_id = response.data.employee_id;
                this.newControl.material_id = response.data.material_id;
                this.newControl.status      = response.data.status;
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedControl: function(id) {
            var control = this.newControl;
            this.clearField();
            this.$http.patch('http://localhost:8000/api/v1/controls/'+ id, control).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-control').modal('hide');
                    // console.log(response.data);
                    this.fetchControl();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        deleteControl: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/controls/'+ id).then((response) => {
                $('#modal-delete-control').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchControl();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // -------------------------Metodo de suporte---------------------------------------------------
        controlEmployee: function() {
            this.$http.get('http://localhost:8000/api/v1/controlEmployee').then((response) => {
                this.$set('employees', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        controlMaterial: function() {
            this.$http.get('http://localhost:8000/api/v1/controlMaterial').then((response) => {
                this.$set('materials', response.data);
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


        statusControlsChange: function(controlStatus) {
            var postData = {id: controlStatus};
            this.$http.post('http://localhost:8000/api/v1/controlStatus/', postData).then((response) => {
                if (response.status == 200) {
                    this.fetchControl();
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchControl(page);
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
