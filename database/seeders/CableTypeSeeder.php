<?php

namespace Database\Seeders;

use App\Models\CableType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CableType::create([
            'name'  => 'RG6']);

        CableType::create([
            'name'  => 'Nano nodo']);

        CableType::create([
            'name'  => 'Micro Nodo']);
    }
}
