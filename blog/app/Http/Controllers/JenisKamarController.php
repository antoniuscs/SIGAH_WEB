<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormJenisKamar;
use App\JenisKamar;
use App\TempatTidur;

class JenisKamarController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $jeniskamars = JenisKamar::paginate(env('PER_PAGE'));
            return view('jenisKamar.index', compact('jeniskamars'))
                ->with('tempattidurs', TempatTidur::all());   
        }else{
            $jeniskamars = JenisKamar::where('nama_jenis_kamar','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $jeniskamars->appends($req->only('search'));
            return view ('jenisKamar.index',compact('jeniskamars'))
                ->with('tempattidurs', TempatTidur::all());
        }   
    }

    public function create()
    {
        $tempattidurs=TempatTidur::all();
        return view('jenisKamar.create',compact('jeniskamars','tempattidurs'));
    }
    
    public function store(ErrorFormJenisKamar $request)
    {
        $jeniskamars= JenisKamar::all();

        $gambar = $request->file('gambar')->getClientOriginalName();
        $destination = public_path('public/uploadImage/');
        $request->file('gambar')->move($destination,$gambar);
        
        JenisKamar::create([
            'nama_jenis_kamar' => request('nama_jenis_kamar'),
            'gambar' => request('gambar')->getClientOriginalName(),
            'kode_jenis_kamar'=>request('kode_jenis_kamar'),
            'detail_jenis_kamar'=>request('detail_jenis_kamar'),
            'pilihan_tempat_tidur_1'=>request('pilihan_tempat_tidur_1'),
            'pilihan_tempat_tidur_2'=>request('pilihan_tempat_tidur_2'),
            'kapasitas'=>request('kapasitas'),
            'harga_jenis_kamar'=>request('harga_jenis_kamar')
        ]);

        return redirect()->route('jenisKamar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(JenisKamar $jeniskamars){
        $tempattidurs=TempatTidur::all();
        return view('jenisKamar.edit', compact('jeniskamars','tempattidurs'));
    }

    public function update(JenisKamar $jeniskamars, Request $request)
    {      
        if($request->hasFile('gambar'))
        {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $destination = public_path('public/uploadImage/');
            $request->file('gambar')->move($destination,$gambar);
        } 

        $jeniskamars->update([
            'nama_jenis_kamar' => request('nama_jenis_kamar'),
            'gambar' => request('gambar')->getClientOriginalName(),
            'kode_jenis_kamar'=>request('kode_jenis_kamar'),
            'detail_jenis_kamar'=>request('detail_jenis_kamar'),
            'pilihan_tempat_tidur_1'=>request('pilihan_tempat_tidur_1'),
            'pilihan_tempat_tidur_2'=>request('pilihan_tempat_tidur_2'),
            'kapasitas'=>request('kapasitas'),
            'harga_jenis_kamar'=>request('harga_jenis_kamar')
        ]);

        return redirect()->route('jenisKamar.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(JenisKamar $jeniskamars){
        $jeniskamars->delete();

        return redirect()->route('jenisKamar.index')->with('success', 'Data berhasil dihapus');;
    }
}
