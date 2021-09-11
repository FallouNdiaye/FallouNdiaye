<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Role;
use App\Models\Profil;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    // public function commentaires(){

    //  return $this->hasMany(Commentaire::class);

    // }
    public function profil(){
        return $this->hasOne(Profil::class);

    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function commentaires(){

     return $this->morphMany(Commentaire::class,'commentaireable');

    }
    public function ProfilPost(){
        return $this->hasOneThrough(Post::class,Profil::class);
    }

    public function latestProfils(){

     return $this->hasOne(Profil::class)->latestOfMany();

    }
    public function oldestProfils(){

        return $this->hasOne(Profil::class)->oldestOfMany();

       }

}
