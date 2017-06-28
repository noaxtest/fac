@extends('vecino.appvecino')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <form  action="{{ route('recibo.update',$recibo->id_recibo) }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="_method"type="hidden" value="PUT">
        <div class="form-group" >
            <label for="nombre">Tipo Recibo</label>
            <select name="tipo" id="tipo" class="form-control" >
                <option value="{{$recibo->tipo}}">{{$recibo->tipo}}</option>
                <option value="Agua"> Agua </option>
                <option value="Cuota Comunidad"> Cuota Comunidad </option>
                <option value="Otros"> Otros </option>
            </select>
        </div>
        <div class="form-group" >
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="{{$recibo->descripcion}}">
        </div>
        <div class="form-group" >
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="{{$recibo->fecha}}">
        </div>
        <div class="form-group" >
            <label for="importe">Importe</label>
            <input name="importe" type="number" step="any" class="form-control" value="{{$recibo->importe}}">
        </div>
        <div class="form-group" >
            <label for="pagado">Pago</label>
            <select name="pagado" id="tipo" class="form-control" >
                <option value="{{$recibo->pagado}}">{{$recibo->pagado}}</option>
                <option value="Si"> SI </option>
                <option value="No"> NO </option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    </form>
    <form  action="{{ route('recibo.destroy',$recibo->id_recibo) }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input name="_method"type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="telefono">Click aquí, para eliminar el recibo actual </label>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection