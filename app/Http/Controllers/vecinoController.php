<?php

namespace Facturacion\Http\Controllers;

use Illuminate\Http\Request;
use Facturacion\Vecino;
use Facturacion\Recibo;
use Facturacion\Http\Requests\VecinoRequest;
use DB;
use Illuminate\Session;


class vecinoController extends Controller
{

    public function index()
    {
        $vecinos = vecino::all();
        return view("vecino.index",compact ("vecinos"));
        //retorna la vista de vecino en el index
    }


    public function create()
    {
        return view ("vecino.create");
    }

    public function store(VecinoRequest $request)
    {
        $vecino = new Vecino();
        $vecino->nombre  =$request->nombre;
        $vecino->apellidos =$request->apellidos;
        $vecino->correo   =$request->correo;
        $vecino->telefono =$request->telefono;
        $vecino->save();

        \Session::flash('usuCreado','El usuario ha sido creado correctamente.');
        return  redirect()->route("vecino.index");
    }


    public function show($id)
    {

    }


    public function edit($id_vecino)
    {
        $vecino = Vecino::find($id_vecino);
        return view('vecino.edit', compact('vecino'));
    }


    public function update(VecinoRequest $request, $id_vecino)
    {
        $vecino = Vecino::find($id_vecino);
        $vecino->nombre  =$request->nombre;
        $vecino->apellidos =$request->apellidos;
        $vecino->correo   =$request->correo;
        $vecino->telefono =$request->telefono;
        $vecino->save();

        \Session::flash('usuModificado','El usuario ha sido modificado correctamente.');
        return  redirect()->route("vecino.index");
    }

    
    public function destroy($id_vecino)
    {

        $tieneRecibos = DB::table('recibos')->where('vecino_id', '=', $id_vecino)->get();
        if($tieneRecibos == null){
            $vecino = Vecino::find($id_vecino);
            $vecino->delete();
            \Session::flash('borrado','El usuario ha sido borrado de manera satisfactoria.');
            return  redirect()->route("vecino.index");
        } else {

            \Session::flash('noborrado','No ha sido posible borrar al usuario ya que actualmente dispone de recibos asignados');
            return redirect()->back();
        }

    }
}
