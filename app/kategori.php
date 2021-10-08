<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kategori extends Model
{
    protected $table ='kategori';
    protected $dates = ['deleted_at'];
    protected $fillable =['id','nama_kategori','deskripsi'];
    public $incrementing = false;
    protected $primaryKey = 'id';


         public static function id(){
             $kode = DB::table('kategori')->max('id');
             //string to int
              $urutan = (int) substr($kode, 3, 3);
              $urutan++;

              $huruf = "KAT";
              $kodetransaksi = $huruf.sprintf("%03s", $urutan);
              return $kodetransaksi;
         }

         public function transaksi(){
            return $this->hasMany('App\transaksi');
        }
}
