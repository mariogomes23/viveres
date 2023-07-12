<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //

    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }


    public function index()

    {
        //

        $permission = $this->permission->orderBy("nome","desc")->paginate(5);
        return View("permission.index",compact("permission"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permission = $this->permission->all();
        return View("permission.create",compact("permission"));
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
        $this->permission->create([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("permission.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $permission = $this->permission->find($id);
        return View("permission.show",compact("permission"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permission = $this->permission->find($id);
        return View("permission.edit",compact("permission"));
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
        $this->permission->find($id)->update([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("permission.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $this->permission->destroy($id);

        return redirect()->route("permission.index")->with("message","apagado com successo");
    }
}
