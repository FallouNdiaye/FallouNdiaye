
@extends('layout')
@section('content')
<h6>{{$client}}</h6>
{{-- <span>{{$client->profil? $client->profil->path : "pas d'image" }}</span> --}}
<img src="{{Storage::url($client->profil->path)}}" alt="">
<hr>
@forelse ( $client->commentaires as $commentaire  )
         <div>
            {{$commentaire->content}} | cree le {{$commentaire->created_at->format('d/m/y')}}
         </div>
@empty
         <span>Aucun commentaire de cette personne</span>
@endforelse
 @forelse ( $client->roles as $role )
     <h4>{{$role->name}}</h4>
 @empty
      <h4>Pas de role pour ce client</h4>
 @endforelse
<hr>

        <h1>le nom de la post est : {{$client->ProfilPost?$client->ProfilPost->name:'pas de nom'}}</h1>
        <span>Notre commentaires le plus rececent: {{$client->latestProfils->path}}</span>
        <span>Notre commentaires le plus ancien: {{$client->oldestProfils->path}}</span>

  {{-- <h6>{{$client->commentaires}}</h6> --}}
@endsection
