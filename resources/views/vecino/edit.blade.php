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
    <form  action="{{ route('vecino.update',$vecino->id_vecino) }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input name="_method"type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$vecino->nombre}}">
        </div>
        <div class="form-group" >
            <label for="apellidos">Nombre</label>
            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{$vecino->apellidos}}">
        </div>
        <div class="form-group" >
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" value="{{$vecino->correo}}">
        </div>
        <div class="form-group" >
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="{{$vecino->telefono}}">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    </form>
    <form  action="{{ route('vecino.destroy',$vecino->id_vecino) }}" method="POST" class="container col-md-6 col-md-offset-3">
        <input name="_method"type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="telefono">Click aquí, para eliminar el usuario actual.</label>
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <div>
            <br>
            @if(Session::has('noborrado'))
                <div class="alert alert-danger" role="alert"> {{Session::get('noborrado')}}</div>
            @endif

        </div>

    </form>


@endsection