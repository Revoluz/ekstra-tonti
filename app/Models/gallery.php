<?php

namespace App\Models;

use App\Models\event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    // protected $guarded = ['id'];
    protected $fillable = ['image','event_id'];
    
          public function getRouteKeyName(){
    return  'image';
  } 
        public function event()
    {
        return $this->belongsTo(event::class,'event_id', 'id');
    }

}
