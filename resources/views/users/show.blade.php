<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Podcasts') }}
        </h2>
    </x-slot>

    <section class="flex">
        <div class="ml-6 mb-6">
            @foreach($user->podcasts as $podcast)
                <div
                    class="w-full p-6 gap-x-8 gap-y-20 px-6 lg:px-8 sm:px-6 lg:px-8  mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg flex inline-flex items-center">
                    <img class="" width="50" height="" src="{{ Storage::url($podcast->image)}}" alt="Podcast">
                    <a href="{{route('podcasts.show', $podcast)}}"> {{$podcast->name}}</a>
                    <audio controls src="{{ Storage::url($podcast->audio ) }}">
                        <source src="{{Storage::url($podcast->audio)}}">
                    </audio>
                    <p class="text-gray-400 text-xs">{{$podcast->created_at}}</p>
                    @can('edit-podcasts', $podcast)
                        <x-primary-link :href="route('podcasts.edit', $podcast)" class="ml-4">Edit</x-primary-link>
                    @endcan
                </div>
            @endforeach
        </div>

        <div class="ml-6 mr-6 w-3/4 h-full p-6 lg:px-8 mt-4 bg-white shadow-sm sm:rounded-lg">
            <img class="" width="" height="" src="./public/img/user.png" alt="">
            <div>
                <p class=""{{$user->description}}></p>
            </div>
            <div class="">
                <h1>{{$user->name}}</h1>
                <p class="text-gray-400 text-xs mb-6">{{$user->email}}</p>
            </div>
            <div class="flex space-x-3">
                <x-primary-link class="mb-4" type="submit" :href="route('profile.edit')">Edit Account</x-primary-link>
                <form action="{{route('podcasts.create')}}" method="GET">
                    @csrf
                    @method('get')
                    <x-primary-button type="submit">Add podcast</x-primary-button>
                </form>
            </div>
        </div>
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
