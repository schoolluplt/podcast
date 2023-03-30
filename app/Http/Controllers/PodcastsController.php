<?php

namespace App\Http\Controllers;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class PodcastsController extends Controller
{
    public function index(){
        $podcasts = Podcast::all();
        return view('podcasts.podcasts', ['podcasts' => $podcasts]);
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

        $podcast = Auth::user()->podcasts()->create($attr);
        return redirect(route('podcasts.show', $podcast))->with('message', 'Podcast successfully published');
    }
    public function show(Podcast $podcast){
        return view('podcasts.show', ['podcast' => $podcast]);
    }

    public function create(){
        return view('podcasts.create');
    }
    public function edit(Podcast $podcast){
        Gate::authorize('edit-podcasts', $podcast);
        return redirect(route('podcasts.edit', $podcast))->with('message', 'Please, edit your podcast !');
    }
    public function destroy(Podcast $podcast){
        Gate::authorize('edit-podcasts', $podcast);
        $podcast->delete();
        return redirect(route('dashboard'))->with('message', 'Podcast successfully deleted !');
    }


}
