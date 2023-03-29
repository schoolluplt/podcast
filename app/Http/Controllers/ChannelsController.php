<?php

namespace App\Http\Controllers;
use App\Models\Channel;

class ChannelsController extends Controller
{
    public function index()
    {
        $channels = Channel::all();

        return view('channels.channels', ['channels' => $channels]);
    }

    public function show(Channel $channel)
    {
        return view('channels.show', ['channel' => $channel]);
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();

        return view('home')->with('message', 'Channel successfully deleted');
    }

}
