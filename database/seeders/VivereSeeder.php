<?php

namespace Database\Seeders;

use App\Models\Vivere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VivereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Vivere::factory()->count(10)->create();
        //
    }
}
