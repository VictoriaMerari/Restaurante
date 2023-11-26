<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_metodos_pago extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('metodos_pago')->insert([
            'forma_pago' => 'EFECTIVO',
            'status' => 1,
        ]);

        \DB::table('metodos_pago')->insert([
            'forma_pago' => 'TARJETA DE CREDITO',
            'status' => 1,
        ]);

        \DB::table('metodos_pago')->insert([
            'forma_pago' => 'TARJETA DE DEBITO',
            'status' => 1,
        ]);

     
    }
}
