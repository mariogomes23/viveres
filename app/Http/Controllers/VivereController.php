<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Vivere;
use Illuminate\Http\Request;

class VivereController extends Controller
{
    private $viveres;

    public function __construct(Vivere $viveres)
    {
        $this->viveres = $viveres;

    }


    public function index()

    {
        //


        $viveres = $this->viveres->orderBy("marca","desc")->paginate(5);
        return View("viveres.index",compact("viveres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipo = Tipo::all();
        $viveres = $this->viveres->all();
        return View("viveres.create",compact("viveres","tipo"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([

            "quantidade"=>["required","min:0","integer"],
            "marca"=>["required"],
            "tipo_id"=>["required","exists:tipos,id"]


        ]);
        $this->viveres->with("tipo")->create($request->all());
        return redirect()->route("viveres.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tipo = Tipo::all();
        $viveres = $this->viveres->find($id);
        return View("viveres.show",compact("viveres"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $tipo = Tipo::all();
        $viveres = $this->viveres->find($id);
        return View("viveres.edit",compact("viveres","tipo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([

            "quantidade"=>["required","min:0","integer"],
            "marca"=>["required"],
            "tipo_id"=>["required","exists:tipos,id"]


        ]);
        $this->viveres->find($id)->update($request->all());
        return redirect()->route("viveres.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $this->viveres->destroy($id);

        return redirect()->route("viveres.index")->with("message","apagado com successo");
    }
}
