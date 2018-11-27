<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DetailReservasiKamar;
use App\DetailReservasiFasilitas;
use App\Customer;
use App\Staff;
use App\Lokasi;
use App\Kamar;
use App\Fasilitas;
use App\Reservasi;

class DetailReservasiController extends Controller
{
    public function index(Reservasi $reservasis, Request $req){
        if($req->search == "") {
            $detailreservasis = DB::table('reservasis')
                        ->leftjoin('detail_reservasi_kamars', 'reservasis.id', '=', 'detail_reservasi_kamars.kode_booking')
                        ->join('detail_reservasi_fasilitas', 'reservasis.id', '=', 'detail_reservasi_fasilitas.kode_booking')
                        ->select('detail_reservasi_kamars.*','detail_reservasi_fasilitas.*')
                        ->get();

            return view ('reservasi.detail',compact('detailreservasis'))
                ->with('customers', Customer::all())
                ->with('staff', Staff::all())
                ->with('lokasis', Lokasi::all())
                ->with('kamars', Kamar::all())
                ->with('fasilitas', Fasilitas::all())
                ->with('detailreservasifasilitas', DetailReservasiFasilitas::all())
                ->with('detailreservasikamars', DetailReservasiKamar::all());

        }else{
            $detailreservasis = DB::table('reservasis')
                    ->join('detail_reservasi_kamars', 'reservasis.id', '=', 'detail_reservasi_kamars.kode_booking')
                    ->join('detail_reservasi_fasilitas', 'reservasis.id', '=', 'detail_reservasi_fasilitas.kode_booking')
                    ->select('detail_reservasi_kamars.*','detail_reservasi_fasilitas.*')
                    ->where('detail_reservasi_kamars.kode_booking','LIKE','%' .$req->search. '%')
                    ->get();
            $detailreservasis->search($req->only('search'));
            return view ('reservasi.detail',compact('detailreservasis'))
                ->with('customers', Customer::all())
                ->with('staff', Staff::all())
                ->with('lokasis', Lokasi::all())
                ->with('kamars', Kamar::all())
                ->with('fasilitas', Fasilitas::all())
                ->with('detailreservasifasilitas', DetailReservasiFasilitas::all())
                ->with('detailreservasikamars', DetailReservasiKamar::all());

        }

    }
}
