<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\History;
use Auth;

class NasabahController extends Controller
{

    public function index()
    {
        $nasabahs = Nasabah::all();
        return view('pages.table-nasabah', compact('nasabahs'));
    }


    public function add_nasabah()
    {
        return view('pages.add-nasabah');
    }

    public function save_newnasabah(Request $request)
    {
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public', $fileName);
        $nasabahs=Nasabah::create([
            'name'=>$request->name,
            'alamat'=>$request->alamat,
            'no_ktp'=>$request->no_ktp,
            'telepon'=>$request->telepon,
            'status_aktif'=>$request->status_aktif,
            'saldo'=>0,
            'file'=>$fileName
            ]);
        $user = Auth::user();
        $log=History::create([
            'user_id'=>$user->id,
            'log'=>'User berhasil menambahkan data nasabah baru'
        ]);
        return redirect()->route('list-nasabah')->with(['success' => 'Data Nasabah atas nama ' . $request->name . ' berhasil ditambahkan!']);
    }

    public function edit_nasabah($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.edit-nasabah', compact('nasabah'));
    }

    public function update_nasabah($id, Request $request)
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
        return redirect()->route('list-nasabah')->with(['success' => 'Data Nasabah atas nama ' . $request->name . ' berhasil diupdate!']);
    }

    public function delete_nasabah($id)
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
        return redirect()->route('list-nasabah')->with(['success' => 'Data Nasabah atas nama ' . $temp->name . ' berhasil didelete!']);
    }

    
}
