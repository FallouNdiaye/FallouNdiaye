@extends('layout')

@section('content')
@foreach ($clients as $client)
<x-newFirstComponent :name="$client->name" class="text-green-500"/>
@endforeach
        <ul>
            @foreach ($clients as $client)

            <li>
                <h5><a href="{{route('client.show',['id'=>$client->id])}}">{{$client}}</a></h5>
            </li>
            @endforeach


        </ul>
        <h1>Liste des videos</h1>

 @forelse ($video->commentaires as $commentaire  )
         <div>
            {{$commentaire->content}} | cree le {{$commentaire->created_at->format('d/m/y')}}
         </div>
@empty
         <span>Aucun  video pour cette personne</span>
@endforelse
@endsection
