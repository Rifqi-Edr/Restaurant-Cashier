<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pegawai')->insert([
            'nama'=>'Dhimas Risqi Ramadhan',
            'username'=>'dhimas01',
            'level'=>'admin',
            'password'=>'1111',
            'created_at'=> date('Y-m-d H:i:s')
        ]);

        DB::table('pegawai')->insert([
            'nama'=>'Naruto Uzumaki',
            'username'=>'naruto',
            'level'=>'kasir',
            'password'=>'1111',
            'created_at'=> date('Y-m-d H:i:s')
        ]);


    }
}
