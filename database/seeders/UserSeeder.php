<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    }
}
