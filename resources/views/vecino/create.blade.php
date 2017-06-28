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
    <form  action="{{ route('vecino.store') }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre"  value="{{ old('nombre') }}">
        </div>
        <div class="form-group" >
            <label for="apellidos">Nombre</label>
            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}">
        </div>
        <div class="form-group" >
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico"value="{{ old('correo') }}" >
        </div>
        <div class="form-group" >
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    </form>
@endsection