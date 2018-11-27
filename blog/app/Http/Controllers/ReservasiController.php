<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormReservasi;
use App\Reservasi;
use App\Customer;
use App\Staff;
use App\Lokasi;
use App\DetailReservasiFasilitas;
use App\DetailReservasiKamar;
use App\Kamar;
use App\Fasilitas;
use App\TempatTidur;
use App\Transaksi;
use DB;

class ReservasiController extends Controller
{
    public function index (Request $req){

        if($req->search == "") {
            $reservasis = Reservasi::paginate(env('PER_PAGE'));
            return view('reservasi.index', compact('reservasis'))
                ->with('customers', Customer::all())
                ->with('staff', Staff::all())
                ->with('lokasis', Lokasi::all());
        }else{
            $reservasis = Reservasi::where('id_booking','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $reservasis->appends($req->only('search'));
            return view ('reservasi.index',compact('reservasis'))
                ->with('customers', Customer::all())
                ->with('staff', Staff::all())
                ->with('lokasis', Lokasi::all());
        }
    }

    public function create()
    {
        $customers = Customer::all();
        $staff = Staff::all();
        $lokasis = Lokasi::all();

        return view('reservasi.create', compact('reservasis','customers','staff','lokasis'));
    }

    public function store()
    {
        Reservasi::create([
            'id_booking' => request('id_booking'),
            'kode_customer' => request('kode_customer'),
            'kode_staff' => request('kode_staff'),
            'jumlah_dewasa' => request('jumlah_dewasa'),
            'jumlah_anak' => request('jumlah_anak'),
            'tanggal_check_in' => request('tanggal_check_in'),
            'tanggal_check_out' => request('tanggal_check_out'),
            'tanggal_reservasi' => request('tanggal_reservasi'),
            'tanggal_pembayaran' => request('tanggal_pembayaran'),
            'status_reservasi' => request('status_reservasi'),
            'kode_lokasi' => request('kode_lokasi'),
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Reservasi $reservasis){
        $customers = Customer::all();
        $staff = Staff::all();
        $lokasis = Lokasi::all();
        $transaksis = Transaksi::all();

        return view('reservasi.edit', compact('reservasis','customers','staff','lokasis','transaksis'));
    }

    public function updateStatus(Reservasi $reservasis, Request $req)
    {
        $reservasis->update([
            'status_reservasi' => "Batal Reservasi",
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibatalkan');
    }

    public function updateCheckIn(Reservasi $reservasis, Request $req)
    {
        $reservasis->update([
            'status_reservasi' => "Check In",
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil Check In');
    }

    public function updateCheckOut(Reservasi $reservasis, Request $req)
    {
        $reservasis->update([
            'status_reservasi' => "Check Out",
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil Check Out');
    }
    public function update(Transaksi $transaksis, Reservasi $reservasis, ErrorFormReservasi $request)
    {
        $reservasis->update([
            'jumlah_dewasa' => request('jumlah_dewasa'),
            'jumlah_anak' => request('jumlah_anak'),
            'tanggal_check_in' => request('tanggal_check_in'),
            'tanggal_check_out' => request('tanggal_check_out'),
            'tanggal_pembayaran' => request('tanggal_pembayaran'),
            'status_reservasi' => request('status_reservasi'),
            'kode_lokasi' => request('kode_lokasi'),
        ]);

        $transaksis->update([
            'tanggal_bayar' => request('tanggal_pembayaran'),
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(DetailReservasiFasilitas $detailfasilitas, DetailReservasiKamar $detailkamar, Reservasi $reservasis, Transaksi $transaksis){
        $reservasis->delete();
        $detailfasilitas->delete();
        $detailkamar->delete();
        $transaksis->delete();

        return redirect()->route('reservasi.index')->with('success', 'Data berhasil dihapus');;
    }

    public function reservasiuser(Request $r)
    {
      $cust = new \App\Customer;
      $cust->titel = $r->title;
      $cust->nama_depan = $r->nd;
      $cust->nama_belakang = $r->nb;
      $cust->alamat =$r->almt;
      $cust->nomor_identitas = $r->ni;
      $cust->jenis_identitas = $r->ji;
      $cust->negara_penerbit_identitas = $r->npi;
      $cust->tanggal_lahir = $r->tl;
      $cust->email = $r->em;
      $cust->nomor_hp = $r->np;
      $cust->nomor_telp = $r->nt;
      $cust->password = '123456';
      $cust->status_peran = '12';
      $cust->save();

      $res = new \App\Reservasi;
      $res->id_booking = 'P'.date('d').date('m').substr(date('y'),-2).'-'.sprintf("%03d", \App\Reservasi::max('id'));
      $res->kode_customer = \App\Customer::max('id');
      $res->kode_staff = '1';
      $res->jumlah_dewasa = $r->jd;
      $res->jumlah_anak = $r->ja;
      $res->tanggal_check_in = $r->ci;
      $res->tanggal_check_out = $r->co;
      $res->tanggal_reservasi = date('Y-m-d');
      $res->tanggal_pembayaran = date('Y-m-d');
      $res->status_reservasi = "Terservasi";
      $res->kode_lokasi = $r->cbg;
      $res->save();

      $dr = new \App\DetailReservasiKamar;
      $dr->kode_booking = \App\Reservasi::max('id');
      $dr->jumlah_kamar = $r->jml;

      $lg = new \App\Login;
      $lg->username_email = $r->em;
      $lg->password = '123456';
      $lg->status_peran = '12';
      $lg->save();

      $us = new \App\User;
      $us->name = $r->nd;
      $us->email = $r->em;
      $us->password = '123456';
      $us->role = '12';
      $us->save();

      return redirect()->to('/index');
    }
}
