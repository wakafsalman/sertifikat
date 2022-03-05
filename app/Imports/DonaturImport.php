<?php

namespace App\Imports;

use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class DonaturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }    
    public function model(array $row)
    {

        $konversi_tanggal = $this->transformDate($row[4]);
        $tanggal = explode('-', $konversi_tanggal);
        $tahun = $tanggal[0];
        $bulan = $tanggal[1];
        $hari = $tanggal[2];

        $ambil_data = Donatur::whereYear('tanggal', $tahun)
                        ->whereMonth('tanggal', $bulan)
                        ->get();

        $cek = count($ambil_data);

        if($cek == 0){
            $angka = sprintf("%03s", 1);
            $no_sertifikat = $angka."/WSI/".$bulan."/".$tahun;          
        }else{
            $angka = sprintf("%03s", $cek + 1);
            $no_sertifikat = $angka."/WSI/".$bulan."/".$tahun;          

        }

        return new Donatur([

            'no_sertifikat' => $no_sertifikat,
            'nama' => $row[0],
            'email' => $row[1],
            'no_telepon' => $row[2],
            'alamat' => $row[3],
            'tanggal_indo' => ''.$tahun.'-'.$bulan.'-'.$hari.'',
            'tanggal' => ''.$tahun.'-'.$bulan.'-'.$hari.'',
            'nominal' => $row[5],
            'tipe_donasi' => $row[6],
            'program_donasi' => $row[7],
            'tampil_alamat' => $row[8],
            'id_users' => auth()->user()->id,
            
        ]);

    }
}
