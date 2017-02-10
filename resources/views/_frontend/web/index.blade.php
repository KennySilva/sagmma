@extends('_frontend.master.app')

@section('content')
    <h1>Ola comerciantes</h1>
@endsection

@push('scripts')
    <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel':	"Imagem %1 of %3"
    })
    </script>

@endpush
