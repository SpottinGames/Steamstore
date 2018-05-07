<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\Review;
use Auth;

class ReviewController extends Controller
{
  public function new (Request $request)
  {
    $game = Game::find($request->id);
    if ($game)
    {
      return view ('reviews.new', compact('game'));
    }
  }
  public function create(Request $request)
  {
    $review = new Review();
    $review->game_id = $request->id;
    $review->user_id = Auth::User()->getId();

    $review->opinion = $request->opinion;
    if($request->vote == 1)
    {
      $review->upvote = $request->vote;
    }else {
      $review->downvote = 1;
    }
    if ($review->save())
    {
      return redirect('/games');
    }
  }
}
