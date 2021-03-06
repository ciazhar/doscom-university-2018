<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peserta;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = [
        'kelas','status'
    ];

    public static function isFull($id)
    {
        $jumlah = $this::find($id)->jumlah;
        if($jumlah == 0){
            return true;
        }return false;
    }

    public static function detailKelas()
    {
        return Kelas::all();
    }

    public static function getName($id)
    {
        return Kelas::find($id)->nama;
    }

    public static function getStatus($id)
    {
        return Kelas::find($id)->status;
    }

    public static function getJumlah($id)
    {
        return Kelas::find($id)->jumlah;
    }

    public static function getKelas(Peserta $peserta)
    {
        return [
            $peserta->web,
            $peserta->femdev,
            $peserta->mobile,
            $peserta->linux,
            $peserta->net,
            $peserta->inkscape,
            $peserta->godot
        ];
    }

}
