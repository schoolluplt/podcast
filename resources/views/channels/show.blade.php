<x-app-layout>
<section class="uk-card uk-card-default uk-card-body uk-margin flex uk-flex-between">
    <div>
        {{ __('My episodes') }}
        @foreach($channel->episodes as $episode)
            <li class=" p-6 text-gray-900 bg-gray-100 mb-4 flex uk-flex-between uk-width-expand@xl">
                <div class="uk-width-auto">
                    <img class="uk-border-square" width="40" height="40" src="{{ Storage::url($episode->image)}}" alt="Podcast">
                </div>
                <a href="{{route('episodes.show', $episode)}}"> {{$episode->name}}</a>
                <img class="uk-border-square" width="40" height="40" src="{{ Storage::url($episode->image)}}" alt="Podcast cover">
                <audio controls src="{{ Storage::url($episode->audio ) }}"><source src="{{Storage::url($episode->audio)}}"></audio>
            </li>
        @endforeach
    </div>

    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" >
                <div class="uk-width-auto">
                    <img class="uk-border-square" width="40" height="40" src="{{$channel->image}}" alt="Avatar">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{$channel->name}}</h3>
                    <p class="uk-text-meta uk-margin-remove-top"{{$channel->description}}></p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <h1>{{$channel->name}}</h1>
            <li>{{$channel->email}}</li>
            <li>{{$channel->id}}</li>
        </div>
        <div class="uk-card-footer">
            <x-primary-button class="uk-button uk-button-default mb-4" type="submit"><a href="{{route('profile.edit')}}"> Edit Account</a></x-primary-button>
{{--            <form action="{{route('channels.index', $channel)}}" method="GET">--}}
{{--                @csrf--}}
{{--                @method('get')--}}
{{--                <x-primary-button type="submit">Go back</x-primary-button>--}}
{{--            </form>--}}
            <form action="{{route('episodes.create')}}" method="GET">
                @csrf
                @method('get')
                <x-primary-button type="submit">Add Episode</x-primary-button>
            </form>
        </div>
    </div>
</section>

<section>

</section>


<h2>{{ session('message') }}
</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif

</x-app-layout>
