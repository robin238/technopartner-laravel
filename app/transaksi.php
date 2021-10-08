<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class transaksi extends Model
{
    protected $table ='transaksi';
    protected $dates = ['deleted_at'];
    protected $fillable =['id','jenis_transaksi','id_kategori','nominal','deskripsi'];
    public $incrementing = false;
    protected $primaryKey = 'id';


         public static function id(){
             $kode = DB::table('transaksi')->max('id');
             //string to int
              $urutan = (int) substr($kode, 3, 3);
              $urutan++;

              $huruf = "TRA";
              $kodetransaksi = $huruf.sprintf("%03s", $urutan);
              return $kodetransaksi;
         }

         public function kategori(){
            return $this->belongsTo('App\kategori');
        }
}
