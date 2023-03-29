<?php

namespace App\Http\Controllers;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        ]);
        $attr['channel_id'] = Auth::user()->id;
        $episode = Episode::create($attr);
        return redirect(route('episodes.show', $episode))->with('message', 'User successfully created');
    }
    public function show(Episode $episode){
        return view('episodes.show', ['episode' => $episode]);
    }

    public function create(){
        return view('episodes.create');
    }
}
