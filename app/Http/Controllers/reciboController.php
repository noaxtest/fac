<?php

namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests\ReciboRequest;
use Facturacion\Recibo;
use Facturacion\Vecino;
use App\Http\Requests;
use DB;

class reciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibos=DB::table('vecinos')
            ->join ('recibos','recibos.vecino_id','=','vecinos.id_vecino')
            ->select('vecinos.id_vecino','vecinos.nombre','vecinos.apellidos','recibos.tipo','recibos.importe','recibos.fecha','recibos.pagado','recibos.id_recibo','recibos.descripcion')
            ->get();

        //dd($recibos);
        return view("recibo.index",compact ("recibos"));
    }

    public function alta($id_vecino)
    {

        return "index recibos";
    }

    public function create()
    {

        $vecinos = vecino::all();
        return view("recibo.create",compact ("vecinos"));
    }

    public function store(ReciboRequest $request)
    {
        $recibo = new Recibo();
        $recibo->tipo  =$request->tipo;
        $recibo->descripcion =$request->descripcion;
        $recibo->fecha   =$request->fecha;
        $recibo->importe =$request->importe;
        $recibo->vecino_id =$request->vecino_id;
        $recibo->pagado =$request->pagado;
        $recibo->save();

        \Session::flash('reciboCreado','El recibo ha sido creado correctamente.');

       return  redirect()->route("recibo.index");
    }


    public function show($id_vecino)
    {
        $recibos=DB::table('vecinos')

            ->join ('recibos','recibos.vecino_id','=','vecinos.id_vecino')
            ->select('vecinos.id_vecino','vecinos.nombre','vecinos.apellidos','recibos.tipo','recibos.importe'
                ,'recibos.fecha','recibos.pagado','recibos.id_recibo','recibos.descripcion')
            ->where('id_vecino',"=",$id_vecino)
            ->get();

        //dd($recibos);
        return view('recibo.listar', compact('recibos'));
    }

    public function edit($id_recibo)
    {
        //$recibo = Recibo::find($id_recibo);
        $recibo = Recibo::findOrFail($id_recibo); 
        return view('recibo.edit', compact('recibo'));
    }

    public function update(ReciboRequest $request, $id_recibo)
    {
        $recibo = Recibo::find($id_recibo);
        $recibo->tipo  =$request->tipo;
        $recibo->descripcion =$request->descripcion;
        $recibo->fecha   =$request->fecha;
        $recibo->importe =$request->importe;
        $recibo->pagado =$request->pagado;
        $recibo->save();

        \Session::flash('reciboModificado','El recibo ha sido modificado correctamente.');
        return  redirect()->route("recibo.index");
    }


    public function destroy($id_recibo)
    {
        $recibo = Recibo::find($id_recibo);
        $recibo->delete();
        \Session::flash('borradoRecibo','El recibo ha sido eliminado correctamente.');
        return  redirect()->route("recibo.index");
    }


}
