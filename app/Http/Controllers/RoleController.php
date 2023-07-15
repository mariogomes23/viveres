<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    //

    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;

    }


    public function index()

    {
        //

       Gate::authorize("lista_roles");


        $role = $this->role->with("permissions")->orderBy("id","desc")->paginate(5);


        return View("role.index",compact("role"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $role = $this->role->with("permissions")->get();
        return View("role.create",compact("role"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        Gate::authorize("adicionar_roles");

        $request->validate([
            "nome"=>["required","string"],


        ]);
        $this->role->create([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("role.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        Gate::authorize("lista_roles");

        $role = $this->role->with("permissions")->find($id);
        return View("role.show",compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permissions = Permission::all();

        $role = $this->role->find($id);
        return View("role.edit",compact("role","permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Gate::authorize("atualizar_roles");
        $request->validate([
            "nome"=>["required","string"],


        ]);
        $this->role->find($id)->update([
            "nome"=>$request->nome,



        ]);
        return redirect()->route("role.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
      Gate::authorize("apagar_roles");
        $this->role->destroy($id);

        return redirect()->route("role.index")->with("message","apagado com successo");
    }


    public function adicionarPermissionInRole($id,Request $request)
    {
        $role = $this->role->find($id);

         $p = $request->input("permissions");

         $role->permissions()->detach();

         $role->permissions()->sync($p);

        return redirect()->route("role.index")->with("message","permissão adicionada com sucesso");
    }


    public function removerPermissionDoRole($id, Request $request)
{
    $role = $this->role->find($id);

    $p = $request->input("permissions");

    $role->permissions()->detach($p);

    return redirect()->route("role.index")->with("message", "Permissão removida com sucesso");
}
}
