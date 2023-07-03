<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{

    private $tipo;

    public function __construct(Tipo $tipo)
    {
        $this->tipo = $tipo;

    }


    public function index()

    {
        //

        $tipo = $this->tipo->orderBy("nome","desc")->paginate(5);
        return View("tipo.index",compact("tipo"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipo = $this->tipo->all();
        return View("tipo.create",compact("tipo"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "nome"=>["required","string"],


        ]);
        $this->tipo->create([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("tipo.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tipo = $this->tipo->find($id);
        return View("tipo.show",compact("tipo"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tipo = $this->tipo->find($id);
        return View("tipo.edit",compact("tipo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "nome"=>["required","string"],


        ]);
        $this->tipo->find($id)->update([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("tipo.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $this->tipo->destroy($id);

        return redirect()->route("tipo.index")->with("message","apagado com successo");
    }
}
