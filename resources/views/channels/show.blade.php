<x-app-layout>
<section class="uk-card uk-card-default uk-card-body uk-margin">

    <div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" >
                <div class="uk-width-auto">
                    <img class="uk-border-circle" width="40" height="40" src="{{$channel->image}}" alt="Avatar">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{$channel->name}}</h3>
                    <p class="uk-text-meta uk-margin-remove-top"{{$channel->description}}></p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <h1>{{$channel->name}}</h1>
            <li>{{$channel->name}}</li>
            <li>{{$channel->email}}</li>
            <li>{{$channel->id}}</li>
        </div>
        <div class="uk-card-footer">
            <form action="{{route('channels.destroy', $channel)}}" method="POST">
                @csrf
                @method('delete')
                <x-primary-button class="uk-button uk-button-default" type="submit">Delete</x-primary-button>
            </form>
        </div>
    </div>
    <br>

    <form action="{{route('channels.index', $channel)}}" method="GET">
        @csrf
        @method('get')
        <x-primary-button class="ml-3" type="submit">Go back</x-primary-button>
    </form>
    <form action="{{route('episodes.create')}}" method="GET">
        @csrf
        @method('get')
        <x-primary-button type="submit">Add Episode</x-primary-button>
    </form>
</section>

<br>

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
