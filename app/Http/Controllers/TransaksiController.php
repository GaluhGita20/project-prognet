<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxSimpanan;
use App\Models\Nasabah;
use App\Models\TrxBunga;
use Auth;
use Carbon\Carbon;
use DateTime;

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
        $nasabahs = Nasabah::where('id','=',$id)->get();
        $trxs = TrxSimpanan::where('nasabah_id', '=', $id)->get();
        $bungas = TrxBunga::where('nasabah_id', '=', $id)->get();
        return view('pages.table-transaksi-user-detail')->with(compact('nasabahs', 'trxs'));
    }

    public function create_trx($id)
    {
        $nasabahs = Nasabah::where('id','=',$id)->get();
        // $user = Auth::user();
        return view('pages.add-transaksi')->with(compact('nasabahs'));
    }

    public function savecreate_trx(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required',
            'jenis_trx' => 'required',
            'nominal_trx'=> 'required|numeric'

        ]);
        
        $transaksi = TrxSimpanan::create([
            'nasabah_id' => $request->nasabah_id,
            'jenis_trx' => $request->jenis_trx,
            'nominal_trx'=> $request->nominal_trx
        ]);
        
        if($request->jenis_trx == 'Simpanan'){
            $data_nasabah = new Nasabah;
            $data_nasabah = Nasabah::where('id','=',$request->nasabah_id)->increment('saldo', $request->nominal_trx);
        }elseif($request->jenis_trx == 'Penarikan'){
            $data_nasabah = new Nasabah;
            $data_nasabah = Nasabah::where('id','=',$request->nasabah_id)->decrement('saldo', $request->nominal_trx);
        }
        // $user = Auth::user();
        return redirect()->route('list-transaksi-user', $request->nasabah_id)->with(['success' => 'Transaksi Baru dengan jenis transaksi' . $request->jenis_trx . ' berhasil dilakukan!']);
    }
}
