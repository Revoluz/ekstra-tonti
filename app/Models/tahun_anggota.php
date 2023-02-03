<?php

namespace App\Models;

// use sluggable;
use App\Models\anggota;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tahun_anggota extends Model
{
    use HasFactory,Sluggable;
    protected $table = 'tahun_anggota';
    protected $guarded = ['id'];

    
      public function anggota()
    {
        return $this->hasMany(anggota::class,'tahun_id','id');
    }
  public function getRouteKeyName(){
    return  'slug';
  } 
        public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'masaAktifAnggota'
            ]
        ];
    }
}

