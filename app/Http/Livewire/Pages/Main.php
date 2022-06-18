<?php

namespace App\Http\Livewire\Pages;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Tweet;
use Livewire\Component;
use App\Models\Favorite;

class Main extends Component
{

    public $tweetText;
    public $perPage = 12;
    public $tweetReply;
    public $tweetFilter = 'all';
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    protected $rules = [
        'tweetText' => ['required'],
        'tweetReply' => ['required']
    ];

    public function render()
    {
        $tweets = null;

        if($this->tweetFilter == 'my') {
            $tweets = Tweet::where('user_id', '=', 1)->latest()->paginate($this->perPage);
        } else {
            $tweets = Tweet::latest()->paginate($this->perPage);
        }
        $this->dispatchBrowserEvent('renderEvent');

        return view('livewire.pages.main', ['tweets' => $tweets])
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

    // Favorite a tweet on click
    public function favoriteTweet($tweetId) {

        $favorite = Favorite::where('tweet_id', '=', $tweetId)->where('user_id', '=', 1)->first();

        if(empty($favorite)) {
            Favorite::create(['tweet_id' => $tweetId, 'user_id' => 1]);
        } else {
            $favorite->delete();
        }

    }

    // Save a tweet on click
    public function sendTweet() {

        $this->validateOnly('tweetText');
        Tweet::create(['user_id' => 1, 'description' => $this->tweetText]);
        session()->flash('sendTweetSuccess', 'Tweet posted!');

    }

    public function sendReply($tweetId) {

        $this->validateOnly('tweetReply');
        Reply::create(['user_id' => 1, 'description' => $this->tweetReply, 'tweet_id' => $tweetId]);
        session()->flash('sendTweetReplySuccess', 'Reply posted!');
        $this->tweetReply = null;
    }

    public function filterTweets($filter) {
        $this->tweetFilter = $filter;
    }
}
