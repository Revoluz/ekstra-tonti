<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class berita extends Model
{
  use HasFactory,Sluggable;
  protected $table = 'berita';
  // protected $guarded = ['id'];
  protected $fillable =[
    'judulBerita',
    'slug',
    'isiBerita',
    'thumbnailImg',
    'published_at',
  ];
  
  public function getRouteKeyName(){
    return  'slug';
  }
        public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judulBerita'
            ]
        ];
    }
}
