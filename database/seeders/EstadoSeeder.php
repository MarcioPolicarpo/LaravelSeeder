<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();
        $json = File::get('database/data/estados.json');
        $data = json_decode($json);
        foreach($data as $estado) {
            Estado::create(array(
                'sigla' => $estado->sigla,
                'nome' => $estado->nome,
                'regiao' => $estado->regiao->nome,
                'codigo_ibge' => $estado->id
            ));
        }
    }
}
