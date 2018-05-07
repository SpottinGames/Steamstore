@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $game->name }}</h1>
  <h2>{{ $game->description}}

  @if($media)
  <div class="row">
    @foreach($media as $image)
      <div class="col-xs-6 col-md-3">
        <a href="#" class="thumbnail">
            <img class="d-block w-100" src="{{ $image->getUrl() }}">
        </a>
      </div>
    @endforeach

    <a href="/review/new/{{$game->id}}" class="btn btn-primary" role="button">Write a review</a>
  </div>
  @endif

  <div class="card black_text">
    Total upvotes: {{ $game->upvotes() }}
    Total downvotes: {{ $game->downvotes() }}
  </div>
  @if($game->reviews)
    @foreach($game->reviews as $review)
    <div class="card review @if($review->upvote) green @else red @endif">
        <p>{{$review->opinion}}<p>
        <span>Upvotes: {{$review->upvote}}</span>
        <span>Downvotes: {{$review->downvote}} </span>
        <p> Review by: {{ $review->user->name}} </p>
    </div>
    @endforeach
  @endif

@endsection
