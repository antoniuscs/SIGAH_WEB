<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormSeason;
use App\Season;
use App\JenisSeason;

class SeasonController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $seasons = Season::paginate(env('PER_PAGE'));
            return view('season.index', compact('seasons'))
                ->with('jenisseasons', JenisSeason::all());
        }else{
            $seasons = Season::where('nama_season','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $seasons->appends($req->only('search'));
            return view('season.index', compact('seasons'))
                ->with('jenisseasons', JenisSeason::all());
        }    
    }

    public function create()
    {
        $jenisseasons= JenisSeason::all();

        return view('season.create',compact('seasons','jenisseasons'));
    }
    
    public function store(ErrorFormSeason $request)
    {
        Season::create([
            'nama_season' => request('nama_season'),
            'tanggal_mulai' => request('tanggal_mulai'),
            'tanggal_selesai' => request('tanggal_selesai'),
            'operasi_season' => request('operasi_season'),
            'presentase_harga' => request('presentase_harga'),
            'jenis_season' => request('jenis_season'),
        ]);

        return redirect()->route('season.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Season $seasons){
        $jenisseasons= JenisSeason::all();
        return view('season.edit', compact('seasons','jenisseasons'));
    }

    public function update(Season $seasons, Request $request)
    {
        $this->validate($request,[
            'tanggal_selesai' => 'required|date|after:tanggal_mulai'
        ]);

        $seasons->update([
            'nama_season' => request('nama_season'),
            'tanggal_mulai' => request('tanggal_mulai'),
            'tanggal_selesai' => request('tanggal_selesai'),
            'operasi_season' => request('operasi_season'),
            'presentase_harga' => request('presentase_harga'),
            'jenis_season' => request('jenis_season'),
        ]);

        return redirect()->route('season.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Season $seasons){
        $seasons->delete();

        return redirect()->route('season.index')->with('success', 'Data berhasil dihapus');;
    }
}
