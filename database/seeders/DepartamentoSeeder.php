<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nome' => 'Administrativo']);
        Departamento::create(['nome' => 'Comercial/Vendas']);
        Departamento::create(['nome' => 'Financeiro']);
        Departamento::create(['nome' => 'Marketing']);
        Departamento::create(['nome' => 'Operacional/Produção']);
        Departamento::create(['nome' => 'Pedagógico']);
        Departamento::create(['nome' => 'Recursos Humanos']);
        Departamento::create(['nome' => 'Outros']);
    }
}
