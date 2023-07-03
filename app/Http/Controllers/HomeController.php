<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\User;
use App\Models\Vivere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function relatorioSubmit()
    {
        $tipo = Tipo::all();
        $viveres = Vivere::all();
        $user = Auth::user();

        view()->share("viveres",$viveres);
        $pdf = PDF::loadView("relatorio")
         ->setPaper("a4","landscape")
         ->setOption(["dpi"=>150,"defaultFont"=>"sans-serif"])
         ->setWarnings(false);

        return $pdf->download("relatorio.pdf");

    }
}
