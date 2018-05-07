@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Games</h1>

  @if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif

  @if(Session::has('succes'))
    <div class="alert alert-succes">{{ Session::get('succes') }}</div>
  @endif

  <div class="row">
    @foreach ($games as $game)
     <div class="col-sm-6 col-md-4 game">
       <div class="thumbnail">
         <img src="{{ $game->getFirstMediaUrl('images', 'thumb') }}">
         <div class="caption">
           <h3>{{$game->name}}</h3>
           <p>{{ str_limit($game->description, 125, ' ...') }}</p>
           <p>
               <a href="/game/{{$game->id}}" class="btn btn-primary" role="button">See more</a>
             @if(Auth::user())
               <a href="/library/add/{{$game->id}}" class="btn btn-success" role="button">Add to Library</a>
             @endif
           </p>
         </div>
       </div>
     </div>
     @endforeach
</div>
@endsection
