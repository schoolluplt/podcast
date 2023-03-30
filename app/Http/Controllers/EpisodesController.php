<?php

namespace App\Http\Controllers;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class EpisodesController extends Controller
{
    public function index(){
        $episodes = Episode::all();
        return view('episodes.episodes', ['episodes' => $episodes]);
    }

    public function store( Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'image' => ['required'],
            'audio' => ['required'],
        ]);

        $attr['image'] = $request->file('image')->store('image');
        $attr['audio'] = $request->file('audio')->store('audio');

        $episode = Auth::user()->episodes()->create($attr);
        return redirect(route('episodes.show', $episode))->with('message', 'Podcast successfully published');
    }
    public function show(Episode $episode){

        return view('episodes.show', ['episode' => $episode]);
    }

    public function create(){
        return view('episodes.create');
    }
}
