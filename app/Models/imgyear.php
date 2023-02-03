<?php

namespace App\Models;

use App\Models\event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class imgyear extends Model
{
    use HasFactory;
    protected $table = 'imgyear';
    protected $guarded = ['id'];

        public function event()
    {
        return $this->hasMany(event::class, 'tahun_id', 'id')->orderBy('id', 'DESC');
    }
      public function getRouteKeyName(){
    return  'tahun';
  } 
    
}
