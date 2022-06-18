<?php

namespace App\Http\Livewire\Pages;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Tweet;
use Livewire\Component;
use App\Models\Favorite;

class Liked extends Component
{

    public $perPage = 12;
    
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function render()
    {
        $likeTweets = null;
        $likeTweets = Like::where('user_id', '=', 1)->latest()->paginate($this->perPage);

        $this->dispatchBrowserEvent('renderEvent');

        return view('livewire.pages.liked', ['liked' => $likeTweets])
        ->extends('layouts.app')
        ->section('content');

    }

    // Make it possible to load extra messages
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    // Like a tweet on click
    public function likeTweet($tweetId) {

        $like = Like::where('tweet_id', '=', $tweetId)->where('user_id', '=', 1)->first();

        if(empty($like)) {
            Like::create(['tweet_id' => $tweetId, 'user_id' => 1]);
        } else {
            $like->delete();
        }

    }

}
