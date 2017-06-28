@extends('vecino.appvecino')
@section('content')
    <div>
        <br>
        @if(Session::has('borrado'))
            <div class="alert alert-success" role="alert"> {{Session::get('borrado')}}</div>
        @endif
        @if(Session::has('usuCreado'))
            <div class="alert alert-success" role="alert"> {{Session::get('usuCreado')}}</div>
        @endif
        @if(Session::has('usuModificado'))
            <div class="alert alert-info" role="alert"> {{Session::get('usuModificado')}}</div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Alta Usuario</div>

                    <div class="panel-body">
                        Por favor, click aquí para crear un usuario. <a href="{{ route('vecino.create') }}"><i class="fa fa-user-plus fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
             <table class="table table-bordered table-hover text-center">
                 <thead>
                    <tr><td>Nombre</td>
                        <td>Correo Electrónico</td>
                        <td>Telefono</td>
                         <td>Alta Recibo</td>
                        <td>Consultar Recibos</td>
                        <td>Editar</td>
                        </tr>

                 </thead>
                 <tbody>

                    @foreach($vecinos as $vecino)
                        <tr>

                            <td value="{{$vecino->id_vecino}}">{{$vecino->nombre . " " . $vecino->apellidos}}</td>
                            <td value="{{$vecino->correo}}">{{$vecino->correo}}</td>
                            <td value="{{$vecino->telefono}}">{{$vecino->telefono}}</td>
                            <td><a href="{{route('recibo.create', [$vecino->id_vecino])}}"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></a></td>
                            <td><a href="{{route('recibo.show', [$vecino->id_vecino])}}"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a></td>
                            <td><a href="{{route('vecino.edit', [$vecino->id_vecino])}}"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a></td>
                        </tr>


                    @endforeach
                 </tbody>
             </table>

            </div>
        </div>
    </div>
@endsection