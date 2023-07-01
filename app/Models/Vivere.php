<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vivere extends Model
{
    use HasFactory;


protected $fillable = ["tipo_id","marca","quantidade"];


public function tipo()
{
    return $this->hasOne(Tipo::class);
}

}
