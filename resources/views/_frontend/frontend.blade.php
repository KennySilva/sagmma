@extends('_frontend.master.app')
@section('front-style')

@endsection
@section('content')
    <!--------------------------------------------------------------------------------------->
    @include('_frontend.master.partials.slide')
    <!----------------------------Alerts----------------------------------------------------------->
    <div class="row">
        <div class="col-md-6">
            @include('flash::message')
        </div>
    </div>
    @include('_frontend.master.partials.pages.market_info')

    <!-- Container (Services Section) -->
    @include('_frontend.master.partials.pages.values')

    <!-- Container (Portfolio Section) -->
    @include('_frontend.master.partials.pages.gallery')

    <!-- Container (Pricing Section) -->
    @include('_frontend.master.partials.pages.market_team')

    <!-- Container (Contact Section) -->
    @include('_frontend.master.partials.pages.contact')

    <!--------------------------------------------------------------------------------------->
    @include('_frontend.master.partials.mapscript')
    <!--------------------------------------------------------------------------------------->
@endsection
@push('scripts')
    <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel':	"Imagem %1 of %3"
    });

    //Clear the modal on hiddeng
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });


    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 6000);

    $(document).ready(function() {
        $('.slider').cycle({
            fx:      'fade, shuffle',
            sync: true,
            next: '#next',
            prev: '#prev',
            pause: true,
            speed:    1000,
            timeout:  5000,
            pager: $('.pager'),
            pagerAnchorBuilder: function(index, DOMelement) {
                return '<a></a>'
            },
            activePagerClass: 'sliderActived',
            fit: 1,
            containerResize: 0,
            width: '100%',
        });
    });

    $('.box-slider').hover(
        function(){
            $('.parSlide').fadeIn();
            $('.prev').fadeIn();
            $('.next').fadeIn();
            $('.pager').fadeIn();
        },
        function(){
            $('.parSlide').fadeOut();
            $('.prev').fadeOut();
            $('.next').fadeOut();
            $('.pager').fadeOut();
        }
    );

    // $(document).ready(function(){
    //     $("div.box-slider img").hover(
    //         function(){$(this).siblings("p:first").show();},
    //         function(){$(this).siblings("p:first").hide();}
    //     );
    // });

    </script>

@endpush
