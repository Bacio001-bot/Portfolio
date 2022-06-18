<?php

namespace App\Http\Livewire\Pages;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Tweet;
use Livewire\Component;
use App\Models\Favorite;

class Favorites extends Component
{

    public $perPage = 12;
    
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function render()
    {
        $favoriteTweets = null;
        $favoriteTweets = Favorite::where('user_id', '=', 1)->latest()->paginate($this->perPage);

        $this->dispatchBrowserEvent('renderEvent');

        return view('livewire.pages.favorites', ['favorites' => $favoriteTweets])
        ->extends('layouts.app')
        ->section('content');

    }

    // Make it possible to load extra messages
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

        // Favorite a tweet on click
        public function favoriteTweet($tweetId) {

            $favorite = Favorite::where('tweet_id', '=', $tweetId)->where('user_id', '=', 1)->first();
    
            if(empty($favorite)) {
                Favorite::create(['tweet_id' => $tweetId, 'user_id' => 1]);
            } else {
                $favorite->delete();
            }
    
        }

}
