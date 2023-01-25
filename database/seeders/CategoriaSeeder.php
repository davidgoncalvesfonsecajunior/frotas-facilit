<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoria::create(['nome' => 'Veiculo Oficial']);
        categoria::create(['nome' => 'Van']);
        categoria::create(['nome' => 'Ônibus']);
    }
}
