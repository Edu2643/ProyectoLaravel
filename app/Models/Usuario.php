<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'idperfil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'idperfil');
    }*/
    public function scopeBuscador($query, $name){
        return $query->where('name','LIKE', '%'.$name.'%');}
}
