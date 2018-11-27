<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormKamar;
use App\Kamar;
use App\JenisKamar;
use App\Lokasi;
use App\Season;

class KamarController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $kamars = Kamar::paginate(env('PER_PAGE'));
            return view('kamar.index', compact('kamars'))
                ->with('jeniskamars', JenisKamar::all())
                ->with('seasons', Season::all());
        }else{
            $kamars = Kamar::where('kode_kamar','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $kamars->appends($req->only('search'));
            return view ('kamar.index',compact('kamars'))
                ->with('jeniskamars', JenisKamar::all())
                ->with('seasons', Season::all());
        }   
    }

    public function create()
    {
        $jeniskamars = JenisKamar::all();
        $seasons = Season::all();
        $lokasis = Lokasi::all();

        return view('kamar.create',compact('kamars','jeniskamars','seasons','lokasis'));
    }
    
    public function store(ErrorFormKamar $request)
    {
        $jenis = JenisKamar::find(request('kode_jenis_kamar'));
        $season = Season::find(request('status_season'));

        if($season['operasi_season']=='Penambahan')
        {
            $harga = $jenis['harga_jenis_kamar'] + ($jenis['harga_jenis_kamar'] * $season['presentase_harga']/100);
        }else if ($season['operasi_season']=='Pengurangan'){
            $harga = $jenis['harga_jenis_kamar'] - ($jenis['harga_jenis_kamar'] * $season['presentase_harga']/100);
        }else if ($season['operasi_season']=='Tetap'){
            $harga = $jenis['harga_jenis_kamar'];
        }

        $kodeKamar = request('nomor_lantai').request('nomor_kamar').$jenis['kode_jenis_kamar'];
        
        $this->validate($request,[
            'kode_kamar' => 'unique:kamars',
        ]);

        Kamar::create([
            'kode_kamar' => $kodeKamar,
            'kode_jenis_kamar' => request('kode_jenis_kamar'),
            'nomor_lantai'=>request('nomor_lantai'),
            'nomor_kamar'=>request('nomor_kamar'),   
            'status_season'=>request('status_season'),
            'harga_kamar'=>$harga,
            'kode_lokasi'=>request('kode_lokasi'),
            'status_smoking'=>request('status_smoking'),
            'status_kamar'=>'Tersedia'
        ]);

        return redirect()->route('kamar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kamar $kamars){
        $jeniskamars = JenisKamar::all();
        $seasons = Season::all();
        $lokasis = Lokasi::all();

        return view('kamar.edit',compact('kamars','jeniskamars','seasons','lokasis'));
    }

    public function update(Kamar $kamars, Request $request)
    {
        $jenis = JenisKamar::find(request('kode_jenis_kamar'));
        $season = Season::find(request('status_season'));

        if($season['operasi_season']=='Penambahan')
        {
            $harga = $jenis['harga_jenis_kamar'] + ($jenis['harga_jenis_kamar'] * $season['presentase_harga']/100);
        }else if ($season['operasi_season']=='Pengurangan'){
            $harga = $jenis['harga_jenis_kamar'] - ($jenis['harga_jenis_kamar'] * $season['presentase_harga']/100);
        }else if ($season['operasi_season']=='Tetap'){
            $harga = $jenis['harga_jenis_kamar'];
        }
            
        $kodeKamar = request('nomor_lantai').request('nomor_kamar').$jenis['kode_jenis_kamar'];

        $kamars->update([
            'kode_kamar' => $kodeKamar,
            'kode_jenis_kamar' => request('kode_jenis_kamar'),
            'nomor_lantai'=>request('nomor_lantai'),
            'nomor_kamar'=>request('nomor_kamar'),
            'status_season'=>request('status_season'),
            'harga_kamar'=>$harga,
            'kode_lokasi'=>request('kode_lokasi'),
            'status_smoking'=>request('status_smoking'),
            'status_kamar'=>request('status_kamar')
        ]);

        return redirect()->route('kamar.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Kamar $kamars){
        $kamars->delete();

        return redirect()->route('kamar.index')->with('success', 'Data berhasil dihapus');;
    }
}
