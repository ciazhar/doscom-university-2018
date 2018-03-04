<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Peserta;
use App\Kelas;

class KelasController extends Controller
{
    public function semuaKelas()
    {
        return Kelas::detailKelas();
    }


    /**
     * do tutup kelas
     */
    public function tutupKelas($nama_kelas)
    {
        $nama = (string)$nama_kelas;
        $kelas = Kelas::where("nama",$nama)->update([
                            'status' => 'penuh'
                        ]);
        return  redirect()->back()->with('msg','kelas '.$nama.' di tutup');
    }

    /**
     * do buka kelas
     */
    public function bukaKelas($nama_kelas)
    {
        $nama = (string)$nama_kelas;
        $kelas = Kelas::where("nama",$nama)->update([
                            'status' => 'sisa'
                        ]);
        return redirect()->back()->with('msg','kelas '.$nama.' di buka');
    }
}
