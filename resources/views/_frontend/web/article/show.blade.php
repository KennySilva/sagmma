@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" media="screen" title="no title" charset="utf-8">
@endsection

@section('htmlheader_title')
    Artigos
@endsection

@section('contentheader_title')
    Artigos
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Artigos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <!------------------------------------------------------------------------------------->
                    <show-article></show-article>
                    <!------------------------------------------------------------------------------------->
                </div>

            </div>
        </div>



    @endsection
    @push('scripts')
        <script src="/bower_components/trumbowyg/dist/trumbowyg.js" charset="utf-8"></script>
        <script>
        $('.textarea-content').trumbowyg();
        </script>
    @endpush
