<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\TrxBunga;
use App\Models\History;
use Auth;


class BungaController extends Controller
{
    public function index()
    {
        $bungas = TrxBunga::all();
        return view('pages.table-bunga', compact('bungas'));
    }


    public function add_bunga()
    {
        $nasabahs = Nasabah::all();
        return view('pages.add-bunga', compact('nasabahs'));
    }

    public function save_newbunga(Request $request)
    {
        $bunga=TrxBunga::create([
            'bulan'=>$request->bulan,
            'tahun'=>$request->tahun,
            'nasabah_id'=>$request->nasabah_id,
            'nominal_bunga'=>$request->nominal_bunga/100,
            ]);
        $user = Auth::user();
        $log=History::create([
            'user_id'=>$user->id,
            'log'=>'User berhasil menambahkan data bunga baru untuk nasabah id '. $request->nasabah_id
        ]);
        return redirect()->route('list-bunga')->with(['success' => 'Data bunga atas nasabah id' . $request->nasabah_id . ' berhasil ditambahkan!']);
    }

    public function edit_bunga($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.edit-bunga', compact('nasabah'));
    }

    public function update_bunga($id, Request $request)
    {
        //

        $temp = Nasabah::find($id);
        if($request->check==0){
            $temp->update([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'no_ktp'=>$request->no_ktp,
                'telepon'=>$request->telepon,
                'status_aktif'=>$request->status_aktif,
            ]);
        }else{
            if(\File::exists('storage/'.$temp->file)){
                \File::delete('storage/'.$temp->file);
            }
            $fileName=time().'.'.$request->file->extension();
            $request->file('file')->storeAs('public', $fileName);
            $temp->update([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'no_ktp'=>$request->no_ktp,
                'telepon'=>$request->telepon,
                'status_aktif'=>$request->status_aktif,
                'file'=>$fileName
            ]);
        }
        $user = Auth::user();
        $log=History::create([
            'user_id'=>$user->id,
            'log'=>'User berhasil mengupdate data nasabah dengan id '.$id
        ]);
        return redirect()->route('list-bunga')->with(['success' => 'Data Nasabah atas nama ' . $request->name . ' berhasil diupdate!']);
    }

    public function delete_bunga($id)
    {
        //
        $temp = Nasabah::find($id);
        if(\File::exists('storage/'.$temp->file)){
            \File::delete('storage/'.$temp->file);
        }
        $temp->delete();
        $user = Auth::user();
        $log=History::create([
            'user_id'=>$user->id,
            'log'=>'User berhasil mengdelete data nasabah dengan id '.$id
        ]);
        return redirect()->route('list-bunga')->with(['success' => 'Data Bunga dengan id ' . $temp->name . ' berhasil didelete!']);
    }

}
