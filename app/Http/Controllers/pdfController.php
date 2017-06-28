<?php

namespace Facturacion\Http\Controllers;

use Illuminate\Http\Request;
use Facturacion\Vecino;
use Facturacion\Recibo;
use Facturacion\Http\Requests\VecinoRequest;
use DB;
use \PDF;

class pdfController extends Controller
{
    
    public function index()
    { 
        // muestra los recibos en formato PDF
        
        $recibos=DB::table('vecinos')
            ->join ('recibos','recibos.vecino_id','=','vecinos.id_vecino')
            ->select('vecinos.id_vecino','vecinos.nombre','vecinos.apellidos','recibos.tipo','recibos.importe','recibos.fecha','recibos.pagado','recibos.id_recibo','recibos.descripcion')
            ->get();

        $pdf = PDF::loadView('recibo.pdf',['recibos'=>$recibos]);
        return $pdf->download('recibo.pdf');

        
        
    }

  
    public function create()
    {
        return ("create pdf");
    }

    public function store(Request $request)
    {
        
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
       
    }
    
    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {
        
    }
}
