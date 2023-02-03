<?php

namespace App\Models;

use App\Models\gallery;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class event extends Model
{
     use HasFactory,Sluggable;
    protected $table = 'event';
    // protected $guarded = ['id'];
    protected $fillable = ['nama_event', 'slug','gambar','tanggal','tahun_id'];

            public function gallery()
    {
        return $this->hasMany(gallery::class,'event_id', 'id');
    }
        public function imgyear()
    {
        return $this->belongsTo(imgyear::class,'tahun_id', 'id');
    }
    public function getRouteKeyName(){
        return  'slug';
    }
            public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'slug'
                ]
            ];
        }

}
