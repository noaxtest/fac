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
    <form  action="{{ route('recibo.store') }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
            <label for="vecino_id">Propietario</label>

                <select name="vecino_id" id="vecino_id" class="form-control" >
                    <option value="nulos">Seleccione una opción</option>
                    @foreach($vecinos as $vecino)
                    <option value="{{$vecino->id_vecino}}">{{$vecino->nombre." ".$vecino->apellidos}}</option>
                    @endforeach
                </select>


        </div>
        <div class="form-group" >
            <label for="nombre">Tipo Recibo</label>
            <select name="tipo" id="tipo" class="form-control" >
                <option value="Agua"> Seleccione una opción</option>
                <option value="Agua"> Agua </option>
                <option value="Cuota Comunidad"> Cuota Comunidad </option>
                <option value="Otros"> Otros </option>
            </select>
        </div>
        <div class="form-group" >
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
        </div>
        <div class="form-group" >
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha">
        </div>
        <div class="form-group" >
            <label for="importe">Importe</label>
            <input name="importe" type="number" step="any" class="form-control" >
        </div>
        <div class="form-group" >
            <label for="pagado">Pago</label>
            <select name="pagado" id="tipo" class="form-control" >
                <option value="Agua"> Seleccione una opción</option>
                <option value="Si"> SI </option>
                <option value="No"> NO </option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    </form>
@endsection