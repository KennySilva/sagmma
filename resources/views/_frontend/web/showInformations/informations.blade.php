@extends('_frontend.master.app')

    @section('content')
        <div class="container-fluid">
            <br><br>

            <div class="row">

                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class ="text-center">COMERCIANTES DO MNAR</h4>
                        </div>
                        <div class="panel-body">
                            @foreach ($traders as $trader)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <img src="/uploads/uploadsImages/traders/{{$trader->photo}}" alt="Placeholder">
                                        <div class="caption">
                                            <h5>{{$trader->name}}</h5>
                                            <a class="" href="#"><i class="fa fa-thumbs-o-up text-primary"></i></a> <span class="badge">0</span>
                                            <hr>
                                            @if ($trader->phone)
                                                <p>{{$trader->phone}}</p>
                                            @else
                                                <p>--- -- --</p>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>


                </div>
                <div class="col-md-3">
                    <aside class="">
                        <div class="panel panel-default">
                            <div class="panel-heading">Informações Úteis </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fa fa-file-pdf-o"></i> Alvará</li>
                                    <li class="list-group-item"><a href="#"><i class="fa fa-file-pdf-o"></i> Quero Iniciar o meu egócio</a></li>
                                    <li class="list-group-item"><a href="#"><i class="fa fa-file-pdf-o"></i> Aquisição do Espaço de Venda</a></li>
                                    <li class="list-group-item"><a href="#"><i class="fa fa-file-pdf-o"></i> Criação do Contrato</a></li>
                                    <li class="list-group-item"><a href="#"><i class="fa fa-file-pdf-o"></i> Pagamento dos Impostos</a></li>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">Todos os Espaços Desponíneis</div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Dimenção</th>
                                        <th>Preço</th>
                                        <th>Tipo de Espaço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($places as $place)
                                        <tr>
                                            <td>{{$place->name}}</td>
                                            <td>{{$place->dimension}} m</td>
                                            <td>ECV {{number_format($place->price, 2, ".", ".")}}</td>
                                            <td>{{$place->typeofplace->name}}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-body">
                            {!!$places->render()!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Espaços Liberados Recentemente</div>
                        <div class="panel-body">
                            <p>A seguir Listan-se os Ultimos cinco (5) espaços liberados Ultimanete</p>
                        </div>

                        <!-- List group -->
                        <ul class="list-group">
                            @foreach ($lastPlaces as $lastPlaces)
                                <li class="list-group-item list-group-item-success">{{$lastPlaces->name}}</li>

                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    @push('scripts')

        <script type="text/javascript">

        $(document).ready(function(ev){

            //Changing the url after click on link 'NOTICIA'
            $("#sagmma").attr("href", "/");
            $("#mmsc").attr("href", "/");
            $("#valores").attr("href", "/");
            $("#galeria").attr("href", "/");
            $("#equipa").attr("href", "/");
            $("#contactar").attr("href", "/");
            $("#myPage").attr("href", "/");
        });
        </script>
    @endpush
