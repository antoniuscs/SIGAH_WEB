<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peran;
use App\Login;
use App\Customer;
use App\User;
use App\Http\Requests\ErrorFormCustomer;

class CustomerController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
            $customers = Customer::paginate(env('PER_PAGE'));
            return view('customer.index', compact('customers'))
                ->with('perans', Peran::all());
        }else{
            $customers = Customer::where('nama_depan','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $customers->appends($req->only('search'));
            return view ('customer.index',compact('customers'))
                ->with('perans', Peran::all());
        }    
    }

    public function create()
    {
        $perans = Peran::all();
        return view('customer.create', compact('customers','perans'));
    }

    public function store(ErrorFormCustomer $request)
    {
        Customer::create([
            'titel' => request('titel'),
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'nama_instansi' => request('nama_instansi'),
            'alamat' => request('alamat'),
            'nomor_identitas' => request('nomor_identitas'),
            'jenis_identitas' => request('jenis_identitas'),
            'negara_penerbit_identitas' => request('negara_penerbit_identitas'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'nomor_hp' => request('nomor_hp'),
            'nomor_telp' => request('nomor_telp'),
            'email' => request('email'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        Login::create([
            'username_email' => request('email'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        User::create([
            'name' => request('nama_depan'),
            'email' => request('email'),
            'password' => request('password'),
            'role' => request('status_peran'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Customer $customers){
        $perans = Peran::all();
        return view('customer.edit', compact('customers','perans'));
    }

    public function update(Request $request, Customer $customers, Login $logins, User $users)
    {
        $customers->update([
            'titel' => request('titel'),
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'nama_instansi' => request('nama_instansi'),
            'alamat' => request('alamat'),
            'nomor_identitas' => request('nomor_identitas'),
            'jenis_identitas' => request('jenis_identitas'),
            'negara_penerbit_identitas' => request('negara_penerbit_identitas'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'nomor_hp' => request('nomor_hp'),
            'nomor_telp' => request('nomor_telp'),
            'email' => request('email'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        $logins->update([
            'username_email' => request('email'),
            'password' => request('password'),
            'status_peran' => request('status_peran'),
        ]);

        $users->update([
            'name' => request('nama_depan'),
            'email' => request('email'),
            'password' => request('password'),
            'role' => request('status_peran'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Customer $customers, Login $logins, User $users){
        $customers->delete();
        $logins->delete();

        return redirect()->route('customer.index')->with('success', 'Data berhasil dihapus');;
    }
}
