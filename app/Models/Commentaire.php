<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    //protected $fillable=['content'];
   protected $guarded=[];
   public function commentaireable(){
       return $this->morphTo();
   }
}
