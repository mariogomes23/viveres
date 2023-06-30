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

        User::insert([
            [
                "name"=>"admin",
                "email"=>"admin@admin",
                "password"=>Hash::make(12345678),
                "role"=>"admin",
                "patente"=>"segundo_sargento",

            ],
            [
                "name"=>"mario oficial logistico",
                "email"=>"oficial@logistico",
                "password"=>Hash::make(12345678),
                "role"=>"oficial_logistico",
                "patente"=>"segundo_sargento",
            ],
            [
                "name"=>"fornecedor",
                "email"=>"fornecedor@fornecedor",
                "password"=>Hash::make(12345678),
                "role"=>"fornecedor",
                "patente"=>"segundo_sargento",
            ],
            [
                "name"=>"chefe_logistico",
                "email"=>"chefelogistico@chefelogistico",
                "password"=>Hash::make(12345678),
                "role"=>"chefe_logistico",
                "patente"=>"segundo_sargento",
            ]
        ]


    );
    }
}
