@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.css">
    {{-- <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" /> --}}
    

@endsection


@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    {{-- Sagmma Home --}}
@endsection


@section('main-content')
    <div class="sagmma_container">
    @include('_backend.master.partials.painelCalendar')
    </div>
</div>
</div>
@endsection


@push('scripts')
    <script src="/plugins/jQueryUI/jquery-ui.js" charset="utf-8"></script>
    <script src="/bower_components/moment/moment.js" charset="utf-8"></script>
    <script src="/bower_components/fullcalendar/dist/fullcalendar.js" charset="utf-8"></script>
    <script src="/bower_components/fullcalendar/dist/locale/pt.js" charset="utf-8"></script>
    <script src="/js/back/calendarEvents.js" charset="utf-8"></script>
@endpush
