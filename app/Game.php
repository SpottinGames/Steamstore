<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\DB;

class Game extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function upvotes()
    {
        return DB::table('reviews')->where('game_id', '=', $this->id)->sum('upvote');
    }

    public function downvotes()
    {
        return DB::table('reviews')->where('game_id', '=', $this->id)->sum('downvote');
    }
}
