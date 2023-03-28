<x-app-layout>
<section class="uk-card uk-card-default uk-card-body uk-margin">

    <div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="uk-border-circle" width="40" height="40" src="{{$user->image}}" alt="Avatar">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{$user->name}}</h3>
                    <p class="uk-text-meta uk-margin-remove-top"> </p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <p>
                <h1></h1>
                <li>{{$user->name}}</li>
                <li>{{$user->email}}</li>
                <li>{{$user->id}}</li>
            </p>
        </div>
        <div class="uk-card-footer">
            <a href="#" class="uk-button uk-button-text">Read more</a>
        </div>
    </div>
    <div >

    </div>

    <br>

    <form action="{{route('channels.index', $user)}}" method="GET">
        @csrf
        @method('get')
        <button class="uk-button uk-button-primary" type="submit">Go back</button>
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
