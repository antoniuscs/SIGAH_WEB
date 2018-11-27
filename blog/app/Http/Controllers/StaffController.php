<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Peran;
use App\Lokasi;
use App\Login;
use App\Http\Requests\ErrorFormStaff;

class StaffController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $staf = Staff::paginate(env('PER_PAGE'));
            return view('staff.index', compact('staf'))
                ->with('lokasis', Lokasi::all())
                ->with('perans', Peran::all());
        }else{
            $staf = Staff::where('nama_depan','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $staf->appends($req->only('search'));
            return view ('staff.index',compact('staf'))
                ->with('lokasis', Lokasi::all())
                ->with('perans', Peran::all());
        }    
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $perans = Peran::all();
        return view('staff.create', compact('staf','perans','lokasis'));
    }
    

    public function store(ErrorFormStaff $request)
    {
        $perans = Peran::find(request('status_peran'));
        $kodeStaff = $perans['kode_peran'].sprintf("%03d", \App\Staff::max('id'));

        Staff::create([
            'kode_staff' => $kodeStaff,
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'nomor_identitas' => request('nomor_identitas'),
            'jenis_identitas' => request('jenis_identitas'),
            'negara_penerbit_identitas' => request('negara_penerbit_identitas'),
            'nomor_hp' => request('nomor_hp'),
            'nomor_telp' => request('nomor_telp'),
            'username' => request('username'),
            'password' => request('password'),
            'kode_lokasi' => request('kode_lokasi'),
            'status_peran' => request('status_peran'),
        ]);

        Login::create([
            'username_email' => request('username'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        return redirect()->route('staff.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Staff $staf){
        $lokasis = Lokasi::all();
        $perans = Peran::all();
        return view('staff.edit', compact('staf','perans','lokasis'));
    }

    public function update(Request $request, Staff $staf, Login $logins)
    {
        $perans = Peran::find(request('status_peran'));
        $kodeStaff = $perans['kode_peran'].sprintf("%03d", \App\Staff::max('id'));

        $staf->update([
            'kode_staff' => $kodeStaff,
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'nomor_identitas' => request('nomor_identitas'),
            'jenis_identitas' => request('jenis_identitas'),
            'negara_penerbit_identitas' => request('negara_penerbit_identitas'),
            'nomor_hp' => request('nomor_hp'),
            'nomor_telp' => request('nomor_telp'),
            'username' => request('username'),
            'password' => request('password'),
            'kode_lokasi' => request('kode_lokasi'),
            'status_peran' => request('status_peran'),
        ]);

        $logins->update([
            'username_email' => request('username'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        return redirect()->route('staff.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Staff $staf){
        $staf->delete();

        return redirect()->route('staff.index')->with('success', 'Data berhasil dihapus');;
    }
}
