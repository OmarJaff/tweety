<?php

namespace App\Http\Livewire;

use App\Tweet;
use Livewire\Component;

class LikeButton extends Component
{

    public function like(Tweet $tweet)
    {
        $tweet->like(current_user());
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
