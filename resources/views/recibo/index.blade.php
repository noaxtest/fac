@extends('vecino.appvecino')
@section('content')
    <div>
        <br>
        @if(Session::has('borradoRecibo'))
            <div class="alert alert-success" role="alert"> {{Session::get('borradoRecibo')}}</div>
        @endif

        @if(Session::has('reciboCreado'))
            <div class="alert alert-success" role="alert"> {{Session::get('reciboCreado')}}</div>
        @endif

        @if(Session::has('reciboModificado'))
            <div class="alert alert-info" role="alert"> {{Session::get('reciboModificado')}}</div>
        @endif

    </div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Alta Recibos</div>

                <div class="panel-body" align="center">
                    <span>
                        Por favor, click aquí para crear un recibo <a href="{{ route('recibo.create') }}"><i class="fa fa-eur fa-3x"></i></a>
                    </span>
                    <span align="right">
                        Presione aquí, para generar un fichero PDF <a href="{{ route('pdf.index') }}"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>
                    </span>
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
                <tr><td>Fecha</td>
                    <td>Nombre</td>
                    <td>Tipo Recibo</td>
                    <td>Descripción</td>
                    <td>Importe</td>
                    <td>Pagado</td>
                    <td>Editar</td>
                </tr>

                </thead>
                <tbody>
                    @foreach($recibos as $recibo)
                        <tr>
                            <td>{{$recibo->fecha}}</td>
                            <td value="{{$recibo->id_recibo}}">{{$recibo->nombre . " " . $recibo->apellidos}}</td>
                            <td>{{$recibo->tipo}}</td>
                            <td>{{$recibo->descripcion}}</td>
                            <td>{{$recibo->importe." €"}}</td>
                            <td>{{$recibo->pagado}}</td>
                            <td><a href="{{route('recibo.edit', [$recibo->id_recibo])}}"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a></td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection