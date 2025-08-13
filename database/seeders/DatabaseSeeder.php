<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


       User::factory()->create([
             'name' => 'Fábio Lima',
             'email' => 'fabiolima01@live.com',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',

             'role'=>'admin'
         ]);

          User::factory()->create([
             'name' => 'Imagem Jacobina',
             'email' => 'jacobina@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
             'loja_id'=>1,
             'role'=>'loja'
         ]);

           User::factory()->create([
             'name' => 'Imagem Capim Grosso',
             'email' => 'capimgrosso@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>2,
             'role'=>'loja'
         ]);

           User::factory()->create([
             'name' => 'Imagem Senhor do bonfim',
             'email' => 'senhordobonfim@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>3,
             'role'=>'loja'
         ]);
          User::factory()->create([
             'name' => 'Imagem Juazeiro',
             'email' => 'juazeiro@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>4,
             'role'=>'loja'
         ]);

          User::factory()->create([
             'name' => 'Imagem Petrolina',
             'email' => 'petrolina@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>5,
             'role'=>'loja'
         ]);

          User::factory()->create([
             'name' => 'Imagem River',
             'email' => 'river@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>6,
             'role'=>'loja'
         ]);

          User::factory()->create([
             'name' => 'Imagem Escritório',
             'email' => 'suporte@lojasimagem.com.br',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'loja_id'=>7,
             'role'=>'loja'
         ]);



          $this->call([
                 LojasSeeder::class,

             ]);

                \App\Models\Funcionario::factory(10)->create();
    }
}
