@extends('vecino.appvecino')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sistema de Facturación</div>



                <div class="panel-body">
                    <?php
                    $valor=0;
                    ?>
                        @if ($recibos == null)
                            <h4>No existen recibos para el usuario.</h4>

                        @else

                            @foreach($recibos as $recibo)

                                @if ($valor == 0)
                                    <h4>Listado de recibos asignados a {{$recibo->nombre . " " . $recibo->apellidos."."}}</h4>

                                    <?php
                                    $valor+=1;
                                    ?>
                                @endif

                            @endforeach

                </div>
            </div>
            <table class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Tipo</td>
                    <td>Descripción</td>
                    <td>Importe</td>
                    <td>Pagado</td>
                </tr>
                </thead>
                <tbody>
                @foreach($recibos as $recibo)
                    @if($recibo === null)
                        <tr>
                            <td>No Aplica</td>
                            <td>No Aplica</td>
                            <td>No Aplica</td>
                            <td>No Aplica</td>
                            <td>No Aplica</td>
                        </tr>
                    @endif
                    <tr>
                        <td>{{$recibo->fecha}}</td>
                        <td>{{$recibo->tipo}}</td>
                        <td>{{$recibo->descripcion}}</td>
                        <td>{{$recibo->importe." €"}}</td>
                        <td>{{$recibo->pagado}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>




        </div>
    </div>
    </div>


    @endif




@endsection