<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vivere extends Model
{
    use HasFactory;


protected $fillable = ["tipo_id","marca","quantidade"];



public function tipo():BelongsTo
{
    return $this->belongsTo(Tipo::class);
}

}
