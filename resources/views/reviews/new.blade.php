@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Schrijf een review</h1>

  <form class="form_container" method="post">

    <div class="form-group">
      <label for="game">Game</label>
      <input type="text" class="form-control" id="game" disabled value="{{ $game->name }}">
    </div>

    <div class="form-group">
      <label for="opinion">Dikke mening</label>
      <textarea name="opinion" class="form-control" id="opinion" rows="3"></textarea>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="vote" id="vote_up" value="1">
      <label class="form-check-label" for="vote">Upvote</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="vote" id="vote_down" value="0">
      <label class="form-check-label" for="vote">Downvote</label>
    </div>

    <div class="form-group">
      <br>
      <input type="submit" class="btn btn-success" value="Review toevoegen">
    </div>

    {{ csrf_field() }}
  </form>

</div>
@endsection
