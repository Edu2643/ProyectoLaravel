<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormasPago extends Model
{
    protected $table ='formaspago';
    protected $fillable = ['nombre'];
    use HasFactory;

}
