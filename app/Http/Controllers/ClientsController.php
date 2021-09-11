<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\Client;
use App\Models\Profil;
use App\Rules\Uppercase;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Events\ClientCreatedEven;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    public function list(){
        //  $clients=[
        //      1=>'Daba',2=>'Adama',3=>'Awa'
        //  ];
        $clients=Client::all();
    // $post=Post::find(1);
    // $post->delete();
    // $posts=Post::withTrashed()->where('id',1)->get();
   // $posts=Post::withTrashed()->where('id',1)->restore();
   //Force delete
//$posts=Post::find(1);
  // $posts->forceDelete();
    //dd($posts);

    $client=Client::find(1);
    $client->update(['name'=>'Bada']);
//$clients=Client::orderBy('name')->take(3)->get();
$video=Video::find(1);
 $clients=Client::orderBy('name')->get();

          return view ('clients.index',['clients'=>$clients,'video'=>$video]);
    }
    public function show($id){
        $clients=[
            1=>'Daba',2=>'Adama',3=>'Awa'
        ];
       // $client=Client::findOrfail($id)?? 'pas de de passe';
        $client=Client::findOrfail($id);
        $video=Video::find($id);
      // $client=Client::where('name','Oswald Pollich')->first();
        return view('clients.clientinfos',['client'=>$client]);
    }
    public function apropos(){
        return view('a-propos');
    }
    public function create(){
        return view("clients.create");
     }
     public function contact(){
        return view('contact');
    }
    public function accueil(){
        return view('welcome');
    }
    public function store(Request $request){
        $request->validate(['name'=>['required','min:5','unique:clients']]);
        $filename=time().'.'.$request->avatar->extension();

        $path=$request->avatar->storeAs('avatartest',$filename,'public');
        $client=Client::create(['name'=>$request->name]);
        $image= new Profil();
        $image->path=$path;
        $client->profil()->save($image);
        event(new ClientCreatedEven($client));
        dd('client cree');

         dd($request->avatar->store('avatartest'));
         $name=Storage::disk('local')->put('avatars',$request->avatar);
         return Storage::download($name);
         dd(Storage::get($name));


        dd($request->avatar->store('images'));
        dd($request->avatar->extension());
        dd($request->file('avatar'));
       // dd($request->input('test','default'));
        dd($request->boolean('horns'),$request->boolean('scales'));
        //dd($request->fullUrlWithQuery(['name'=>'112345']));
        //  $url=$request->path();
       // dd($request->routeIs('client.store'));
       // dd($request->is('client/create'));
         // Client::create(['name'=>$request->name]);

        // $client=new Client();
        // $client->name=$request->name;
        // $client->save();

    }
    public function register(){
        $client=Client::find(11);
        $video=Video::find(1);
       $commentaire1=new Commentaire(['content'=>'mon premier commentaire']);
       $commentaire2=new Commentaire(['content'=>'mon deuxieme commentaire']);
       $commentaire3=new Commentaire(['content'=>'mon troisieme commentaire']);
 $commentaire3=new Commentaire;
 $commentaire3->content="bonjour abdoulaye seck";

     // dd($commentaire3);
$client->commentaires()->saveMany([$commentaire1,$commentaire2]);
$video->commentaires()->save($commentaire3);
}
}

