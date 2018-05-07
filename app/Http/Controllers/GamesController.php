<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;

class GamesController extends Controller
{

    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function new()
    {
        return view('games.new');
    }

    public function create(GameRequest $request)
    {
          $game = new Game();
          $game->name = $request->name;
          $game->description = $request->description;
          $game->highlighted = $request->highlighted;
          $game->price = $request->price;
          $game->available = $request->available;
          $game->save();

        foreach ($request->images as $image) {
            $game->addMedia($image)->toMediaCollection('images');
        }

          return redirect('/games');
    }
    public function show(Request $request)
    {
          $game = Game::find($request->id);
        if ($game) {
            $media = $game->getMedia('images');
            return view('games.show', compact('game', 'media'));
        }
    }
}
