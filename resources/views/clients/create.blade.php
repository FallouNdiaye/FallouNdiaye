@extends('layout')
@section('content')
<h2>Creer des clients</h2>
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="text-red-500">{{$error}}</div>
@endforeach

@endif
<form method="POST" action="{{route('client.store')}}" enctype="multipart/form-data">
    @csrf
      <input type="text" name="name" class="border-grey-600 border-2">
      <p>Choose your monster's features:</p>

<div>
  <input type="checkbox" id="scales" name="scales"
         checked>
  <label for="scales">Scales</label>
</div>

<div>
  <input type="checkbox" id="horns" name="horns">
  <label for="horns">Horns</label>
</div>
<label for="avatar">Choose a profile picture:</label><br>

<input type="file" class='block my-2'
       id="avatar" name="avatar"
       accept="image/png, image/jpeg">


      <button type="submit">Creer</button>
  </form>
@endsection
