<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Imports\DonaturImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;


class DonaturController extends Controller
{

    public function index(){

        $data       =   Donatur::orderBy('id','DESC')->get();
        $judul      =   'Donasi';
        $statistik_donatur = Donatur::select('tanggal')
                                    ->selectRaw('count(nama) as jumlah_donatur')
                                    ->groupby('tanggal')
                                    ->orderby('tanggal')
                                    ->get();
        $statistik_donasi  = Donatur::select('tanggal')
                                    ->selectRaw('sum(nominal) as jumlah_donasi')
                                    ->groupby('tanggal')
                                    ->orderby('tanggal')
                                    ->get();
        return view('donatur/data', compact('data','judul','statistik_donatur','statistik_donasi'));

    }

    public function tambah_donatur(Request $request){


        $tanggal = explode('-', $request->tanggal);
        $tahun = $tanggal[0];
        $bulan = $tanggal[1];

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

        Donatur::create([
            'no_sertifikat'     =>  $no_sertifikat,
            'tanggal_indo'      =>  $request->tanggal,
            'tanggal'           =>  $request->tanggal,
            'nama'              =>  $request->nama,
            'email'             =>  $request->email,
            'no_telepon'        =>  $request->no_telepon,
            'alamat'            =>  $request->alamat,
            'nominal'           =>  $request->nominal,
            'tipe_donasi'       =>  $request->tipe_donasi,
            'program_donasi'    =>  $request->program_donasi,
            'tampil_alamat'     =>  $request->tampil_alamat,
            'id_users'          =>  auth()->user()->id,
            'no_resi'           =>  $request->no_resi,
        ]);
        return redirect()->route('donatur')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_donatur(Request $request, $id){


        $data = Donatur::find($id);
        $rubah_data = [
            'tanggal_indo'      =>  $request->tanggal,
            'tanggal'           =>  $request->tanggal,
            'nama'              =>  $request->nama,
            'email'             =>  $request->email,
            'no_telepon'        =>  $request->no_telepon,
            'alamat'            =>  $request->alamat,
            'nominal'           =>  $request->nominal,
            'tipe_donasi'       =>  $request->tipe_donasi,
            'program_donasi'    =>  $request->program_donasi,
            'tampil_alamat'     =>  $request->tampil_alamat,
            'id_users'          =>  auth()->user()->id,
            'no_resi'           =>  $request->no_resi,
        ];
        $data->update($rubah_data);
        return redirect()->route('donatur')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_donatur($id){

        $data = Donatur::find($id);
        $data->delete();
        return redirect()->route('donatur')->with('success', 'Data berhasil dihapus');

    }

    public function hapus_donatur_pilihan(Request $request){

        $ids = $request->ids;
        Donatur::whereIn('id',explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);

    }

    public function eksport_pdf($id){

        $data = Donatur::find($id);

        $no_sertifikat = explode('/', $data['no_sertifikat']);

        $nomor = $no_sertifikat[0];
        $bulan = $no_sertifikat[2];
        $tahun = $no_sertifikat[3];
        $pdf = PDF::loadview('donatur/data_pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('Sertifikat-'.$nomor.'-WSI-'.$bulan.'-'.$tahun.'.pdf');

    }

    public function print_pdf($id){

        $data = Donatur::find($id);

        $pdf = PDF::loadview('donatur/data_pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->stream();

    }

    public function import_excel(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataDonatur', $nama_file);

        Excel::import(new DonaturImport, \public_path('/DataDonatur/'.$nama_file));
        return \redirect()->back();
        
    }

}
