<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Xícara',
            'description' => 'Xícara muito boa, mantém o café quente por bastante tempo.',
            'price' => 15,
        ]);
        DB::table('products')->insert([
            'name' => 'Copo',
            'description' => 'Tecnologia inovadora, mantém sua bebida sempre gelada.',
            'price' => 80,
        ]);
        DB::table('products')->insert([
            'name' => 'Sofá',
            'description' => 'Sofá confortável, 4 lugares, ótimo para sua sala de visitas.',
            'price' => 350,
        ]);
        DB::table('products')->insert([
            'name' => 'Monitor',
            'description' => '144hz, perfeito para quem curte jogar fps',
            'price' => 1250,
        ]);
        DB::table('products')->insert([
            'name' => 'Cadeira Gamer',
            'description' => 'Perfeita para quem ama passar o dia codando.',
            'price' => 899,
        ]);
    }
}
