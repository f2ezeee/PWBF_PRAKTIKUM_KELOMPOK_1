<?php

namespace Database\Seeders;

use App\Models\DetailPeran;
use App\Models\Kemajuan;
use Illuminate\Database\Seeder;
use App\Models\Pengurus;
use App\Models\Peran;
use App\Models\Santri;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Peran::create([
            'peran' => 'Guru',
            'aktif' => '1',
        ]);

        Peran::create([
            'peran' => 'Staff',
            'aktif' => '1',
        ]);

        //Membuat data dari pengurus
        DetailPeran::factory(10)->create();

        //Membuat data santri
        Santri::factory(30)->create();

        //Membuat data kemajuan
        Kemajuan::factory(100)->create();


        // Pengurus::factory(10)->create()->each(function ($m) {
        //     $detailperan = DetailPeran::factory()->make();
        //     $kemajuan = Kemajuan::factory(5)->make();
        // });
        
    }
}
