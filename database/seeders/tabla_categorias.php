<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_categorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $var1[1]='Bebidas';
        $var1[2]='Entrada';
        $var1[3]='Ensaladas';
        $var1[4]='platos principales';
        $var1[5]='Postres';

        $var2[1]='Bebidas refrescantes o vinos';
        $var2[2]='Plato que antecede al segundo plato o principal';
        $var2[3]='plato de verduras crudas, aliñado con una salsa fría';
        $var2[4]='platillo mas elaborado y complejo de todos';
        $var2[5]='Preparaciones dulces';

        for ( $i = 1 ; $i <= 5 ; $i++ ){
            \DB::table('categorias')->insert([
                'nombre' => $var1[$i],
                'descripcion' => $var2[$i],
                'status' => 1,
            ]);
        }
    }
}
