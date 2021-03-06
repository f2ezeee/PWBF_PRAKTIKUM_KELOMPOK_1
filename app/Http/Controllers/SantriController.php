<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('dashboard.santri', [
            
            'santri' => Santri::all(),

        ]);
    }

    public function list() {
        //
        $santri = Santri::select('idsantri','namasantri')->get();
        // $data = $buku->map(function ($item, $key){
        //     return collect($item)->flatten();
        // });
        return response()->json($santri);
    }

    public function create(Request $request) {
        if (!Gate::allows('isStaff')) 
            abort(403);
        $santri = Santri::create($request->all());
        if ($santri) {
            $santri->update($request->all());
            return redirect()->back()->with('success', 'Santri berhasil di-tambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update(Request $request, $id) {
        if (!Gate::allows('isStaff')) 
            abort(403);
        $santri = Santri::find($id);
        if ($santri) {
            $santri->update($request->all());
            return redirect()->back()->with('success', 'Santri berhasil di-update');
        } else {
            return redirect()->back()->with('error', 'Santri gagal di-update');
        }
    }

    public function delete($id) {
        if (!Gate::allows('isStaff')) 
            abort(403);
        try {
            $santri = Santri::find($id);
            $santri->delete();
            return redirect()->back()->with('success', 'Santri berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Santri gagal dihapus');
        }    
    }
}
