<?php

namespace Facturacion;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Vecino extends Model 
{
   

    protected $table = 'vecinos';
    protected $primaryKey='id_vecino';


    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono'];


    public function recibos()
    {
        return $this->hasMany('Facturacion\Recibo');

    }
}
