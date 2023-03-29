<?php

namespace App\Http\Controllers;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EpisodesController extends Controller
{
    public function index(){
        $episodes = \App\Models\Episode::all();
        return view('episodes.episodes', ['episodes' => $episodes]);
    }
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

}
