<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_tipos_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $var1[1]='Administrador';
        $var1[2]='Chef';
        $var1[3]='Mesero';
        $var1[4]='Cliente';

        $var2[1]='Todos los privilegios';
        $var2[2]='Solo visualiza los pedidos';
        $var2[3]='Visualiza la orden y  puede descargar el ticket';
        $var2[4]='Realiza pedidos y compras';


        for ( $i = 1 ; $i <= 4 ; $i++ ){
            \DB::table('tipos_usuario')->insert([
                'nombre' => $var1[$i],
                'nivel' => $i,
                'descripcion' => $var2[$i],
                'status' => 1,
            ]);
        }
    }
}
