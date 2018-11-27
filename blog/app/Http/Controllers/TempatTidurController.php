<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormRequest;
use App\TempatTidur;

class TempatTidurController extends Controller
{

    public function index (Request $req){
        if($req->search == "") {
            $tempattidurs = TempatTidur::paginate(env('PER_PAGE'));
            return view('tempatTidur.index', compact('tempattidurs'));
        }else{
            $tempattidurs = TempatTidur::where('nama_tempat_tidur','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $tempattidurs->appends($req->only('search'));
            return view ('tempatTidur.index',compact('tempattidurs'));
        }    
    }

    public function create()
    {
        return view('tempatTidur.create');
    }
    
    public function store(ErrorFormRequest $request)
    {
        TempatTidur::create([
            'nama_tempat_tidur' => request('nama_tempat_tidur'),
            'jumlah' => request('jumlah')
        ]);

        return redirect()->route('tempatTidur.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(TempatTidur $tempattidurs){
        return view('tempatTidur.edit', compact('tempattidurs'));
    }

    public function update(TempatTidur $tempattidurs)
    {
        $tempattidurs->update([
            'nama_tempat_tidur' => request('nama_tempat_tidur'),
            'jumlah' => request('jumlah')
        ]);

        return redirect()->route('tempatTidur.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(TempatTidur $tempattidurs){
        $tempattidurs->delete();

        return redirect()->route('tempatTidur.index')->with('success', 'Data berhasil dihapus');;
    }
}
