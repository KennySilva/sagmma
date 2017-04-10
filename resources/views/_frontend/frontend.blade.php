@extends('_frontend.master.app')
@section('front-style')

@endsection
@section('content')
    <!----------------------------Alerts----------------------------------------------------------->


    @include('_frontend.master.partials.alerts')
    <div class="row">
        <div class="col-md-6">
            @include('flash::message')
        </div>
    </div>
    <!--------------------------------------------------------------------------------------->
    @include('_frontend.master.partials.indexCarouce')
    <!--------------------------------------------------------------------------------------->
    {{-- <show-promotion-in-front></show-promotion-in-front> --}}
    <!-- Container (About Section) -->
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
    }, 4000);

    </script>

@endpush
