<?php

namespace App\Models;

use App\Models\anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $guarded = ['id'];

  public function getRouteKeyName(){
    return  'name';
  }

    public function tahun_anggota()
    {
        return $this->belongsTo(tahun_anggota::class, 'tahun_id','id');
    }
}
