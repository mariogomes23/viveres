<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user= $user;

    }


    public function index()

    {
        //

 Gate::authorize("lista_usuarios");

        $user = $this->user->with("role")->orderBy("id","desc")->paginate(5);
        return View("user.index",compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $roles = Role::all();

         $patentes =
         [
            "segundo_cabo",
            "primeiro_cabo",
            "segundo_sargento",
            "primeiro_sargento",
            "sargento_adjudante",
            "sargento_chefe",
            "aspirante",
            "segundo_tenente",
            "primeiro_tenente",
            "capitao",
            "major",
            "tenente_coronel",
            "coronel",
            "major_general",
            "tenente_general",
            "general"

         ];
        $user = $this->user->all();
        return View("user.create",compact("user","roles","patentes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize("adicionar_usuarios");

        $request->validate([
            "name"=>["required","string"],
            "email"=>["required","string","email"],
            "password"=>["required","min:8"],
            "patente"=>["required"],
            "role_id"=>["required"]

        ]);

       $this->user->create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "patente"=>$request->patente,
                "role_id"=>$request->role_id


            ]);



        return redirect()->route("user.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //

        Gate::authorize("atualizar_usuarios");

        $role = Role::all();
        $user = $this->user->find($id);
        return View("user.show",compact("user","role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::all();

        $patentes =
        [
           "segundo_cabo",
           "primeiro_cabo",
           "segundo_sargento",
           "primeiro_sargento",
           "sargento_adjudante",
           "sargento_chefe",
           "aspirante",
           "segundo_tenente",
           "primeiro_tenente",
           "capitao",
           "major",
           "tenente_coronel",
           "coronel",
           "major_general",
           "tenente_general",
           "general"

        ];
        //
        $user = $this->user->find($id);
        return View("user.edit",compact("user","role","patentes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

      Gate::authorize("atualizar_usuarios");
        $request->validate([
            "name"=>["required","string"],
            "email"=>["required","string","email"],
            "password"=>["required","min:8"],
            "patente"=>["required"],
            "role_id"=>["required"],

        ]);
        $this->user->find($id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "patente"=>$request->patente,
            "role_id"=>$request->role_id


        ]);
        return redirect()->route("user.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
  Gate::authorize("apagar_usuarios");
        $this->user->destroy($id);

        return redirect()->route("user.index")->with("message","apagado com successo");
    }



}
