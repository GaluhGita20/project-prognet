<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxSimpanan;
use App\Models\Nasabah;
use App\Models\TrxBunga;
use Auth;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $nasabahs = Nasabah::all();
        $user = Auth::user();
        return view('pages.table-transaksi', compact('nasabahs'));
    }
}
