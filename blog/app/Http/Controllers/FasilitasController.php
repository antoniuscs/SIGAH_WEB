<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormFasilitas;
use App\Fasilitas;

class FasilitasController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $fasilitas = Fasilitas::paginate(env('PER_PAGE'));
            return view('fasilitas.index', compact('fasilitas'));
        }else{
            $fasilitas = Fasilitas::where('nama_fasilitas','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $fasilitas->appends($req->only('search'));
            return view ('fasilitas.index',compact('fasilitas'));
        }    
    }

    public function create()
    {
        return view('fasilitas.create');
    }
    
    public function store(ErrorFormFasilitas $request)
    {
        Fasilitas::create([
            'nama_fasilitas' => request('nama_fasilitas'),
            'harga_fasilitas' => request('harga_fasilitas')
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Fasilitas $fasilitas){
        return view('fasilitas.edit', compact('fasilitas'));
    }

    public function update(Fasilitas $fasilitas)
    {
        $fasilitas->update([
            'nama_fasilitas' => request('nama_fasilitas'),
            'harga_fasilitas' => request('harga_fasilitas')
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Fasilitas $fasilitas){
        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil dihapus');;
    }
}
