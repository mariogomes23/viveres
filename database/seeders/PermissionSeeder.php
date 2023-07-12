<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
           Permission::insert([

            [
                "nome"=>"create_user"



            ],
            [
                "nome"=>"delete_user"

            ],
            [
                "nome"=>"edit_user"

            ],
            [
                "nome"=>"index_user"

            ]
           ]);





           Permission::insert([

            [
                "nome"=>"create_viveres"



            ],
            [
                "nome"=>"delete_viveres"

            ],
            [
                "nome"=>"edit_viveres"

            ],
            [
                "nome"=>"index_viveres"

            ]
           ]);


           Permission::insert([

            [
                "nome"=>"create_tipoViveres"



            ],
            [
                "nome"=>"delete_tipoViveres"

            ],
            [
                "nome"=>"edit_tipoViveres"

            ],
            [
                "nome"=>"index_tipoViveres"

            ]
           ]);
    }
}
