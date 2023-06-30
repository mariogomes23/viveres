<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivere extends Model
{
    use HasFactory;


protected $fillable = ["tipo_id","marca","quantidade"];


public function tipos()
{
    return $this->hasMany(Tipo::class);
}

}
