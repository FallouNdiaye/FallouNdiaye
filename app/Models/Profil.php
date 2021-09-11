<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;
    public function client(){

            return $this->belongsTo(Client::class);

    }

    public function post(){
        return $this->hasOne(Post::class);

    }
}
