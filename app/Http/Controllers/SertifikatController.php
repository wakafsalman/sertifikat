<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;

class SertifikatController extends Controller
{

    public function index(){

        $judul = 'E-Sertifikat Wakaf Salman ITB';
        return view('login', compact('judul'));

    }

    public function beranda(){

        $date           = new DateTime('now');
        $date_carbon    = Carbon::now();
        $tanggal_full   = $date->format('Y-m-d');
        $nama_bulan     = $date_carbon->format('F');

        $tanggal = explode('-', $tanggal_full);
        $tahun = $tanggal[0];
        $bulan = $tanggal[1];

        $judul = 'Dashboard';
        $jumlah_donatur = Donatur::count();
        $jumlah_donasi = Donatur::sum('nominal');
        $jumlah_donasi_per_bulan = Donatur::whereMonth('tanggal', '=', $bulan)
                                            ->get();
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

        return view('main', compact('judul','jumlah_donatur','jumlah_donasi','jumlah_donasi_per_bulan','nama_bulan','statistik_donatur','statistik_donasi'));

    }

    public function lihat_sertifikat($id){

        $data = Donatur::find($id);
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
        return view('donatur/sertifikat', compact('data','statistik_donatur','statistik_donasi'));

    }

    public function proses_login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/beranda');
        }

        return redirect('/');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
