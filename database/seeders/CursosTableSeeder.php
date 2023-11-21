<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpe a tabela antes de inserir dados (opcional)
        DB::table('cursos')->truncate();

        // Inserir dados de exemplo
        DB::table('cursos')->insert([
            'name' => 'Curso de PHP OBJ',
            'descricao' => 'Descrição soluções reutilizáveis de sofware orientado a OBJ',
            'instrutor_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
