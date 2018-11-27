<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\Transaksi;
use App\DetailReservasiFasilitas;
use App\DetailReservasiKamar;
use DB;

class TransaksiController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $transaksis = Transaksi::paginate(env('PER_PAGE'));
            return view('transaksi.index', compact('transaksis'))
                ->with('reservasis', Reservasi::all());
        }else{
            $transaksis = Transaksi::
                join('reservasis','reservasis.id','=','transaksis.kode_booking')
                ->where('reservasis.id_booking','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $transaksis->appends($req->only('search'));
            return view ('transaksi.index',compact('transaksis'))
                ->with('reservasis', Reservasi::all());
        }    
    }

    public function create()
    {
        return view('transaksi.create');
    }
    
    public function store()
    {
        Transaksi::create([
            'kode_booking' => request('kode_booking'),
            'total_keseluruhan' => request('total_keseluruhan'),
            'uang_deposit' => request('uang_deposit'),
            'uang_jaminan' => request('uang_jaminan'),
            'tanggal_pelunasan' => request('tanggal_pelunasan'),
            'jenis_pembayaran' => request('jenis_pembayaran'),
            'nomor_identitas_pembayaran' => request('nomor_identitas_pembayaran'),
            'total_bayar' => request('uang_deposit') + request('uang_jaminan'),
            'status_pembayaran' => 'Belum Lunas'
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Transaksi $transaksis){
        return view('transaksi.edit', compact('transaksis'));
    }

    public function update(Transaksi $transaksis)
    {
        $transaksis->update([
            'uang_deposit' => request('uang_deposit'),
            'uang_jaminan' => request('uang_jaminan'),
            'tanggal_pelunasan' => date("Y-m-d"),
            'jenis_pembayaran' => request('jenis_pembayaran'),
            'nomor_identitas_pembayaran' => request('nomor_identitas_pembayaran'),
            'total_bayar' => request('uang_deposit') + request('uang_jaminan'),
            'status_pembayaran' => request('status_pembayaran'),
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(DetailReservasiFasilitas $detailfasilitas, DetailReservasiKamar $detailkamar, Reservasi $reservasis, Transaksi $transaksis){
        $reservasis->delete();
        $detailfasilitas->delete();
        $detailkamar->delete();
        $transaksis->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');;
    }
}
