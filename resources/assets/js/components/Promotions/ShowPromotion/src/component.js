import Pagination from '../../../Pagination/src/Component.vue'
import { _ } from 'lodash'
import myDatepicker from 'vue-datepicker/vue-datepicker-1.vue'

export default{
    name: 'ShowPromotion',


    data(){
        return {
            showColumn: {
                ic: '',
                service_beginning: '',
            },
            newPromotion: {
                id            : '',
                name          : '',
                begnning_date : '',
                ending_date   : '',
                trader_id     : '',
                product_id    : '',
                status        : '',
                description   : '',
                trader:  '',
                product:  '',
            },


            promotions  : {},
            traders    : [],
            products      : [],


            sortColumn : 'name',
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
            auth: [],
            date_atual: new Date(),

            // Vue-Datepicker
            option: {
                type: 'day',
                week: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                month: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                format: 'YYYY-MM-DD',
                placeholder: 'Data',
                inputStyle: {
                    'display': 'inline-block',
                    'padding': '6px',
                    'line-height': '20px',
                    'font-size': '14px',
                    'border': '1px solid #d2d6de',
                    'border-radius': '0px',
                    'color': '#5F5F5F',

                },
                color: {
                    header: '#228074',
                    headerText: '#ffffff'
                },
                buttons: {
                    cancel: 'Cancelar',
                    ok: 'Escolher',
                },
                overlayOpacity: 0.5, // 0.5 as default
                dismissible: true // as true as default
            },

            limit: [{
                type: 'weekday',
                available: [1, 2, 3, 4, 5, 6]
            },
            {
                type: 'fromto',
                from: '2017-02-01',
                // to: '2016-02-20'
            }],
        }
    },


    ready () {
        this.fetchPromotion(this.pagination.current_Page, this.showRow)
        this.promotionTrader()
        this.promotionProduct()
        this.authUser()
        // this.changePromotionStatus()



        self = this
        jQuery(self.$els.promotioncols).select2({
            placeholder: "Coluna",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('columnsFiltered', jQuery(this).val());
        });
        // ----------------------------------------------------------------
        jQuery(self.$els.tradercreate).select2({
            placeholder: "Comerciantes",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPromotion.trader_id', jQuery(this).val());
        });
        jQuery(self.$els.productcreate).select2({
            placeholder: "Produtos",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPromotion.product_id', jQuery(this).val());
        });
        // ----------------------------------------------------------------

        jQuery(self.$els.traderedit).select2({
            placeholder: "Comerciantes",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPromotion.trader_id', jQuery(this).val());
        });
        jQuery(self.$els.productedit).select2({
            placeholder: "Produtos",
            allowClear: true,
            theme: "bootstrap",
            width: '100%',
            language: 'pt',
        }).on('change', function () {
            self.$set('newPromotion.product_id', jQuery(this).val());
        });
        // ----------------------------------------------------------------

    },

    methods: {
        // changePromotionStatus: function() {
        //     this.$http.get('http://localhost:8000/api/v1/changePromotionStatus').then((response) => {
        //     }, (response) => {
        //     });
        // },
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
            this.newPromotion = {
                id            : '',
                name          : '',
                begnning_date : '',
                ending_date   : '',
                trader_id     : '',
                product_id    : '',
                status        : '',
                description   : '',
                trader   : '',
                product   : '',
            };
        },

        // --------------------------------------------------------------------------------------------

        createPromotion: function() {
            //Promotion input
            var promotion = this.newPromotion;

            //Clear form input
            this.$http.post('http://localhost:8000/api/v1/promotions/', promotion).then((response) => {
                if (response.status == 200) {
                    console.log('chegando aqui');
                    $('#modal-create-promotion').modal('hide');
                    this.clearField();

                    console.log(response.data);
                    this.fetchPromotion(this.pagination.current_Page, this.showRow);
                    alert('Promoção Criado com sucesso', 'success');

                }
            }, (response) => {

            });
        },

        // --------------------------------------------------------------------------------------------
        
        fetchPromotion: function(page, row) {
            this.$http.get('http://localhost:8000/api/v1/allPromotions/'+row+'?page='+page).then((response) => {
                this.$set('promotions', response.data.data);
                this.$set('all', response.data.data)
                this.$set('pagination', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------

        getThisPromotion: function(id){
            this.clearField();

            this.$http.get('http://localhost:8000/api/v1/promotions/' + id).then((response) => {
                this.newPromotion.id            = response.data.id;
                this.newPromotion.name          = response.data.name;
                this.newPromotion.begnning_date = response.data.begnning_date;
                this.newPromotion.ending_date   = response.data.ending_date;
                this.newPromotion.trader_id     = response.data.trader_id;
                this.newPromotion.product_id    = response.data.product_id;
                this.newPromotion.status        = response.data.status;
                this.newPromotion.description   = response.data.description;
                this.newPromotion.product = response.data.product.name;
                this.newPromotion.trader = response.data.trader.name;
                // var trader = response.data.trader;
                // for (var trad in trader) {
                //     this.newUser.trader.push(trader[trad])
                // }
            }, (response) => {
                console.log('Error');
            });
        },

        // --------------------------------------------------------------------------------------------

        saveEditedPromotion: function(id) {
            var promotion = this.newPromotion;
            this.$http.patch('http://localhost:8000/api/v1/promotions/'+ id, promotion).then((response) => {
                if (response.status == 200) {
                    $('#modal-edit-promotion').modal('hide');
                    this.clearField();

                    // console.log(response.data);
                    this.fetchPromotion(this.pagination.current_Page, this.showRow);
                    this.alert('Promoção Atualizado com sucesso', 'info');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        // --------------------------------------------------------------------------------------------


        deletePromotion: function(id) {
            this.$http.delete('http://localhost:8000/api/v1/promotions/'+ id).then((response) => {
                $('#modal-delete-promotion').modal('hide');
                if (response.status == 200) {
                    // console.log(response.data);
                    this.fetchPromotion(this.pagination.current_Page, this.showRow);
                    this.alert('Promoção Eliminado com sucesso', 'success');
                }
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionTrader: function() {
            this.$http.get('http://localhost:8000/api/v1/promotionTrader').then((response) => {
                this.$set('traders', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionProduct: function() {
            this.$http.get('http://localhost:8000/api/v1/promotionProduct').then((response) => {
                this.$set('products', response.data);
            }, (response) => {
                console.log("Ocorreu um erro na operação");
            });
        },

        promotionStatus: function(status) {
            var postData = {id: status};

            this.$http.post('http://localhost:8000/api/v1/promotionStatus/', postData).then((response) => {
                console.log(response.status);
                console.log(response.data);
                if (response.status == 200) {
                    this.fetchPromotion(this.pagination.current_Page, this.showRow);
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

        checkPermition: function() {
            var roles = this.auth.roles;
            for (var rol in roles) {
                if (roles[rol].name == 'admin' || roles[rol].name == 'super-admin' || roles[rol].name == 'manager' || roles[rol].name == 'dpel') {
                    return true;
                }
            }
        },




        // -------------------------Metodo de suporte---------------------------------------------------
        doFilter: function() {
            var self = this
            filtered = self.all
            if (self.filter.term != '' && self.columnsFiltered.length > 0) {
                filtered = _.filter(self.all, function(promotion) {
                    return self.columnsFiltered.some(function(column) {
                        return promotion[column].toLowerCase().indexOf(self.filter.term.toLowerCase()) > -1
                    })
                })
            }
            self.$set('promotions', filtered)
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
            // console.log(ev);
        },

        // --------------------------------------------------------------------------------------------

        // Outros funções
        navigate (page) {
            this.fetchPromotion(page, this.showRow);
        },


    },

    components: {
        'Pagination': Pagination,
        'date-picker': myDatepicker

    }
}
