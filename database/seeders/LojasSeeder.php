<?php

namespace Database\Seeders;

use App\Models\Loja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LojasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Loja::create([
        'nome'=>'Jacobina',
        'endereco'=>'Av. Orlando Oliveira Pires, 206',
        'bairro'=>'Centro',
        'cidade'=>'Jacobina',
        'telefone'=>'(74) 3621-3085'

       ]);
       Loja::create([
        'nome'=>'Capim Grosso',
        'endereco'=>'Av. ACM, 01',
        'bairro'=>'Centro',
        'cidade'=>'Capim Grosso',
        'telefone'=>'(74) 3651 - 1255'

       ]);

        Loja::create([
        'nome'=>'Senhor do Bonfim',
        'endereco'=>'Pça. Rua Rui Barbosa, 08 ',
        'bairro'=>'Centro',
        'cidade'=>'Senhor do Bonfim',
        'telefone'=>'(74) 3541 - 3685'

       ]);

          Loja::create([
        'nome'=>'Juazeiro',
        'endereco'=>'Rua Américo Alves, 14',
        'bairro'=>'Centro',
        'cidade'=>'Juazeiro',
        'telefone'=>'(74) 3612 - 7373'

       ]);

           Loja::create([
        'nome'=>'Petrolina',
        'endereco'=>'Av. Guararapes, 1783 ',
        'bairro'=>'Centro',
        'cidade'=>'Petrolina',
        'telefone'=>'(87) 3866 - 2121'

       ]);

           Loja::create([
        'nome'=>'River',
        'endereco'=>'Monsenhor Ângelo Sampaio, 100',
        'bairro'=>'Centro',
        'cidade'=>'Petrolina',
        'telefone'=>'(87) 3861 - 4355'

       ]);

           Loja::create([
        'nome'=>'Escritório',
        'endereco'=>'Av. Orlando Oliveira Pires, 206',
        'bairro'=>'Centro',
        'cidade'=>'Jacobina',
        'telefone'=>'(74) 3621-7900'

       ]);
    }
}
