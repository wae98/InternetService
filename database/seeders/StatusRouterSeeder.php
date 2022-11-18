<?php

namespace Database\Seeders;

use App\Models\StatusRouter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusRouterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusRouter::create([
            'name'  => 'Disponible',
            'description'  => 'No está asignado a ningún cliente.',
        ]);

        StatusRouter::create([
            'name'  => 'Asignado',
            'description'  => 'Se le ha asignado a un cliente.',
        ]);

        StatusRouter::create([
            'name'  => 'Averiado',
            'description'  => 'Cable ya no funciona, hay que darlo de baja',
        ]);

        StatusRouter::create([
            'name'  => 'Reparación',
            'description'  => 'Se envia a servicio tecnico para su reparación',
        ]);
    }
}
