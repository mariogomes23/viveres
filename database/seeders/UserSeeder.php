<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create(
            [
                "name"=>"admin",
                "email"=>"admin@admin",
                "password"=>Hash::make(12345678),
                "role_id"=>1,
                "patente"=>"segundo_sargento",

            ]

    );


    User::create([


            "name"=>"mario oficial logistico",
            "email"=>"oficial@logistico",
            "password"=>Hash::make(12345678),
            "role_id"=>3,
            "patente"=>"segundo_sargento",

    ]);

    User::create([
        "name"=>"chefe_logistico",
        "email"=>"chefelogistico@chefelogistico",
        "password"=>Hash::make(12345678),
        "role_id"=>2,
        "patente"=>"segundo_sargento",

    ]);



    $roleID = 1;
    $permissionIDs = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];

    $records = collect($permissionIDs)->map(function ($permissionID) use ($roleID) {
        return [
            'role_id' => $roleID,
            'permission_id' => $permissionID,
        ];
    });

    DB::table('permission_role')->insert($records->toArray());

    }
}
