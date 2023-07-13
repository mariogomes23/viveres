<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

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

        $this->authorize("index_tipoUsuario",Role::class);

        $role = $this->role->with("permissions")->orderBy("nome","desc")->paginate(5);


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

        $this->authorize("create_tipoUsuario",Role::class);
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
        //
        $this->authorize("index_tipoUsuario",Role::class);
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
        //
        $this->authorize("edit_tipoUsuario",Role::class);
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
        $this->authorize("delete_tipoUsuario",Role::class);

        $this->role->destroy($id);

        return redirect()->route("role.index")->with("message","apagado com successo");
    }

    
    public function adicionarPermissionInRole($id,Request $request)
    {
        $role = $this->role->find($id);

         $p = $request->input("permissions");

         $role->permissions()->syncWithoutDetaching($p);

        return redirect()->route("role.index")->with("message","permissão adicionada com sucesso");
    }
}
