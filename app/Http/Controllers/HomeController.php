<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\User;
use App\Models\Vivere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function painel()
    {
        $tipo = Tipo::all();
        $viveres = Vivere::all();
        $user = Auth::user();
        return View("painel",compact("tipo","viveres","user"));
    }
}
