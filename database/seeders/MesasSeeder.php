<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Mesa::insert([
        ['numero'=>1,'capacidad'=>4,'estado'=>'libre','created_at'=>now(),'updated_at'=>now()],
        ['numero'=>2,'capacidad'=>2,'estado'=>'libre','created_at'=>now(),'updated_at'=>now()],
        ['numero'=>3,'capacidad'=>6,'estado'=>'libre','created_at'=>now(),'updated_at'=>now()],
    ]);
}

}
