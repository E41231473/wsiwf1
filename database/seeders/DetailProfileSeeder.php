<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_profile_table1')->insert([
            'address' => 'Jember',
            'nomor_tlp' => '08xxxxxxx',
            'tll' => '2000-11-26',
            'foto' => 'picture.png'
        ]);
    }
}
