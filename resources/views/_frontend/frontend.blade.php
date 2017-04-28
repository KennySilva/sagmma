@extends('_frontend.master.app')
@section('front-style')

@endsection
@section('content')
    <div class="front-body">

    @include('_frontend.master.partials.slide')
    @include('_frontend.master.partials.messages')
    @include('_frontend.master.partials.pages.market_info')
    @include('_frontend.master.partials.pages.values')
    @include('_frontend.master.partials.pages.gallery')
    @include('_frontend.master.partials.pages.market_team')
    @include('_frontend.master.partials.pages.contact')
</div>
@endsection
@push('scripts')
    <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel':	"Imagem Numero %1"
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
    </script>

@endpush
