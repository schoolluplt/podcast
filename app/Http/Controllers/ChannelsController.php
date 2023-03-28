<?php

namespace App\Http\Controllers;
use App\Models\Channel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index()
    {
        $channels = Channel::all();

        return view('channels.channels', ['channels' => $channels]);
    }

    public function create()
    {
        $channels = Channel::all();
        return view('users.channels', ['channels' => $channels]);
    }

    public function show(Channel $channel)
    {
        return view('channels.show', ['channel' => $channel]);
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();

        return redirect(route('channels.index'))->with('message', 'Channel successfully deleted');
    }

}
