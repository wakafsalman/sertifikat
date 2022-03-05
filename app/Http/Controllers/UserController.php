<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index(){

        $data       =   User::all();
        $judul      =   'Pengaturan';
        return view('user/data', compact('data','judul'));

    }

    public function tambah_user(Request $request){

        $data = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect()->route('user')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_user(Request $request, $id){

        $data = User::find($id);
        $data_update=[
            'nama' => $request->nama,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => bcrypt($request->password),
        ];
        $data->update($data_update);
        return redirect()->route('user')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_user($id){

        $data = User::find($id);
        $data->delete();
        return redirect()->route('user')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_user(){

        return Excel::download(new UserExport, 'Daftar User Wakaf Salman.xlsx');

    }

    public function import_user(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataUser', $nama_file);

        Excel::import(new UserImport, \public_path('/DataUser/'.$nama_file));
        return \redirect()->back();

    }

}
