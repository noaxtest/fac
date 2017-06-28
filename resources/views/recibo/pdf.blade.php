<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        td {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<h1>Listado de Recibos </h1>

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
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <h2>{{$ldate = date('d-m-Y H:i:s')}}</h2>
</div>
</body>
</html>