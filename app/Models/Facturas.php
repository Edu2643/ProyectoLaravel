<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table = 'facturas';
    protected $fillable = [
        'numero', 'detalles', 'valor', 'archivo', 'idcliente', 'idforma', 'idestado'
    ];
    
    public function cliente()
    {return $this->belongsTo(Clientes::class, 'idcliente');
    }
    public function scopeBuscador($query, $numero){
        return $query->where('numero','LIKE', '%'.$numero.'%');}
}


