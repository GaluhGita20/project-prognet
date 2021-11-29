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
        return view('pages.table-transaksi-user', compact('nasabahs'));
    }

    public function list_transaksi_user($id)
    {
        $nasabahs = Nasabah::find($id)->get();
        $trxs = TrxSimpanan::where('nasabah_id', '=', $id)->get();
        $bungas = TrxBunga::where('nasabah_id', '=', $id)->get();
        return view('pages.table-transaksi-user-detail')->with(compact('nasabahs', 'trxs'));
    }

    public function create_trx($id)
    {
        $nasabahs = Nasabah::find($id)->get();
        // $user = Auth::user();
        return view('pages.add-transaksi')->with(compact('nasabahs'));
    }
}
