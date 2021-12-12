<?php

namespace App\Http\Controllers;

use App\Models\DetailPeran;
use App\Models\Kemajuan;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function profile(){
        return view('dashboard.users-profile');
    }

    public function raport(){
        return view('dashboard.kemajuan', [
            'kemajuan' => Kemajuan::all()
        ]);
    }

    public function detailraport(){
        return view('dashboard.detailkemajuan');
    }

    public function buku(){
        return view('dashboard.bab');
    }

    public function pengurus(){
        $pengurus = Pengurus::all();
        $pengurus->load('detailperan.peran');
        return view('dashboard.pengurus', [
            "pengurus" => $pengurus,
        ]);
    }

    

    public function hapus($id){
        Pengurus::find($id)->delete();
    }

    // public function remove(){
    //     Pengurus::find(11)->delete();
    // }
}