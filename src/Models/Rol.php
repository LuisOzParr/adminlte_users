<?php

namespace Ozparr\AdminlteUsers\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table="roles";

    protected $fillable = [
        'id',
        'nombre',
        'nivel'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }
}
