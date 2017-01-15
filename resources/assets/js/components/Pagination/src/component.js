// import { range } from 'lodash' /*usado no comentado abaixo no metodo source*/
// import from 'lodash' este chamaria biblioteca completa
// import { range, map, outros } from 'lodash' -> Exemplo do biblioteca personalizados que podem ser chamados
export default{


    name: 'Pagination',

    props: [
        'source'
    ],

    
    data(){
        return {
            pages     : [],
            searchPage: '',
            input     : false,
            // searchBotton: false,
        }
    },

    methods: {
        showInput (ev){
            ev.preventDefault()
            if (this.input == false) {
                this.input = true
                this.searchPage = ''
            }else {
                this.input = false
            }
        },



        navigate (ev, page) {
            ev.preventDefault()
            this.$dispatch('navigate', page)
        },

        // --------------------------------------------------------------------


        nextPrev(ev, page) {
            if (page == 0 || page == this.source.last_page+1) {
                return;
            }
            this.navigate(ev, page)
        },

        //--------------------------------------------------------------------



        generatePagesArray: function(currentPage, collectionLength, rowsPerPage, paginationRange)
        {
            var pages = [];
            var totalPages = Math.ceil(collectionLength / rowsPerPage);
            var halfWay = Math.ceil(paginationRange / 2);
            var position;

            if (currentPage <= halfWay) {
                position = 'start';
            } else if (totalPages - halfWay < currentPage) {
                position = 'end';
            } else {
                position = 'middle';
            }

            var ellipsesNeeded = paginationRange < totalPages;
            var i = 1;
            while (i <= totalPages && i <= paginationRange) {
                var pageNumber = this.calculatePageNumber(i, currentPage, paginationRange, totalPages);
                var openingEllipsesNeeded = (i === 2 && (position === 'middle' || position === 'end'));
                var closingEllipsesNeeded = (i === paginationRange - 1 && (position === 'middle' || position === 'start'));
                if (ellipsesNeeded && (openingEllipsesNeeded || closingEllipsesNeeded)) {
                    pages.push('...');
                } else {
                    pages.push(pageNumber);
                }
                i ++;
            }
            return pages;
        },

        // --------------------------------------------------------------------



        calculatePageNumber: function(i, currentPage, paginationRange, totalPages)
        {
            var halfWay = Math.ceil(paginationRange/2);
            if (i === paginationRange) {
                return totalPages;
            } else if (i === 1) {
                return i;
            } else if (paginationRange < totalPages) {
                if (totalPages - halfWay < currentPage) {
                    return totalPages - paginationRange + i;
                } else if (halfWay < currentPage) {
                    return currentPage - halfWay + i;
                } else {
                    return i;
                }
            } else {
                return i;
            }
        },


        //--------------------------------------------------------------------
    },

    watch: {
        source() {
            let s           = this.source
            this.pages      = this.generatePagesArray(s.current_page, s.total, s.per_page, 5)
            this.searchPage =''
            this.input      =false
        },

        // showSearchBotton (){
        //     if (this.source.last_page > 7) {
        //         searchBotton: true
        //     }else {
        //         searchBotton: false
        //     }
        // },
    },

    ready () {
        console.log('Component is ready')
    },

    // computed: {
    //     showSearchBotton (){
    //         if (this.source.last_page < 8) {
    //             searchBotton: false
    //         }else {
    //             searchBotton: true
    //         }
    //     },
    // },
    //
    components: {}
}
