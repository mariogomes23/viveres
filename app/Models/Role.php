<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class);

    }

    public function hasPermission($nome)
    {
      return  $this->permission()->where("nome",$nome);

    }


}
