@extends('_frontend.master.app')

@section('front-style')
<style media="screen">

#custom_carousel .item {

    color:#000;
    background-color:#fff;
    padding:20px 20px;
}
#custom_carousel .controls{
    overflow-x: auto;
    overflow-y: hidden;
    padding:0;  
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background:#eee
}
#custom_carousel .controls li {
    display: table-cell;
    width: 1%;
    max-width:90px
}
#custom_carousel .controls li.active {
    background-color:#fff;
    border-bottom:3px solid #3495E6;
}
#custom_carousel .controls a small {
    overflow:hidden;
    display:block;
    font-size:10px;
    margin-top:5px;
    font-weight:bold
}
</style>

@endsection

@section('content')
    @include('_frontend.master.partials.caroucelNews')



@endsection

@push('scripts')
    <script type="text/javascript">
    $(document).ready(function(ev){
        $('#custom_carousel').on('slide.bs.carousel', function (evt) {
            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
        })
    });
    </script>
@endpush
