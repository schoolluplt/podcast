<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Podcasts') }}
        </h2>
    </x-slot>

    <section class="container flex">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
        @foreach($user->podcasts as $podcast)
            <li class=" p-6 text-gray-900 bg-gray-100 mb-4 flex ">
                <div class="">
                    <img class="" width="40" height="40" src="{{ Storage::url($podcast->image)}}" alt="Podcast">
                </div>
                <a href="{{route('podcasts.show', $podcast)}}"> {{$podcast->name}}</a>
                <img class="" width="40" height="40" src="{{ Storage::url($podcast->image)}}" alt="Podcast cover">
                <audio controls src="{{ Storage::url($podcast->audio ) }}"><source src="{{Storage::url($podcast->audio)}}"></audio>
            </li>
        @endforeach
    </div>

    <div class="">
        <div class="">
            <div class="" >
                <div class="">
                    <img class="" width="40" height="40" src="{{$user->image}}" alt="Avatar">
                </div>
                <div class="">
                    <h3 class="">{{$user->name}}</h3>
                    <p class=""{{$user->description}}></p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <h1>{{$user->name}}</h1>
            <li>{{$user->email}}</li>
            <li>
                {{$user->id}}</li>
        </div>
        <div class="">
            <x-primary-button class=" mb-4" type="submit"><a href="{{route('profile.edit')}}"> Edit Account</a></x-primary-button>
{{--            <form action="{{route('users.index', $user)}}" method="GET">--}}
{{--                @csrf--}}
{{--                @method('get')--}}
{{--                <x-primary-button type="submit">Go back</x-primary-button>--}}
{{--            </form>--}}
            <form action="{{route('podcasts.create')}}" method="GET">
                @csrf
                @method('get')
                <x-primary-button type="submit">Add podcast</x-primary-button>
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
