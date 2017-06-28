<?php

namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
   
    protected $table = 'recibos';
    protected $primaryKey='id_recibo';

   
    protected $fillable = ['recibo_id','nombre_recibo', 'tipo', 'fecha', 'importe', 'pagado', 'vecino_id'];
    

    public function vecino()
    {
        return $this->belongsTo('Facturacion\Vecino');

    }
}
