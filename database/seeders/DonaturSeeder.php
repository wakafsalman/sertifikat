<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donaturs')->insert([
            'no_sertifikat' => '001/WSI/02/2022',
            'nama' => 'Radian Pradhana',
            'email' => 'radianpradhana@gmail.com',
            'no_telepon' => '081239115524',
            'alamat' => 'Jl. Madurasa Utara No.14 RT 003 RW 007 Kel. Cigereleng Kec. Regol Kota Bandung 40253',
            'tanggal_indo' => '2022-02-24',
            'tanggal' => '2022-02-24',
            'nominal' => '24000000',
            'tipe_donasi' => 'Wakaf',
            'program_donasi' => 'Pemberian Sistem Virtual Fair dari Dash Digital Indonesia untuk Wakaf Salman ITB',
            'tampil_alamat' => '1',
            'id_users' => '1',
        ]);
    }
}
