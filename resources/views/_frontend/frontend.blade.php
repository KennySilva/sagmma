@extends('_frontend.master.app')

@section('content')
    <!----------------------------Alerts----------------------------------------------------------->
    @include('_frontend.master.partials.alerts')
    <!--------------------------------------------------------------------------------------->
    @include('_frontend.master.partials.carousel')
    <!--------------------------------------------------------------------------------------->

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

    
    </script>

@endpush
