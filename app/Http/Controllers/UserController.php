<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }


    public function index()

    {
        //

        $user = $this->user->all();
        return View("user.index",compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = $this->user->all();
        return View("user.create",compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "name"=>["required","string"],
            "email"=>["required","string","email"],
            "password"=>["required","min:8"],
            "patente"=>["required"],

        ]);
        $this->user->create([
            "name"=>$request->name,
            "email"=>$request->name,
            "password"=>Hash::make($request->password),
            "patente"=>$request->patente,
            "role"=>"oficial_logistico"


        ]);
        return redirect()->route("user.index")->with("message","adicionado com successo");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = $this->user->find($id);
        return View("user.show",compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = $this->user->find($id);
        return View("user.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "name"=>["required","string"],
            "email"=>["required","string","email"],
            "password"=>["required","min:8"],
            "patente"=>["required"],

        ]);
        $this->user->find($id)->update([
            "name"=>$request->name,
            "email"=>$request->name,
            "password"=>Hash::make($request->password),
            "patente"=>$request->patente,
            "role"=>"oficial_logistico"


        ]);
        return redirect()->route("user.index")->with("message","atualizado com successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $this->user->destroy($id);

        return redirect()->route("user.index")->with("message","apagado com successo");
    }
}
