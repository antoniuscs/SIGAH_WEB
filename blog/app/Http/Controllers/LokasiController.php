<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function ptcdata($year){
      return view('laporan.data-ptc',compact('year'));
    }

    public function jtkcdata($year)
    {
        return view('laporan.data-jtkc',compact('year'));
    }

    public function jccdata($year)
    {
        return view('laporan.data-jcc',compact('year'));
    }
}
