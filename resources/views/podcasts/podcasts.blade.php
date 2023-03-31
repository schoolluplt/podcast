<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcasts') }}
        </h2>
    </x-slot>
    <h2>{{ session('status') }}</h2>

    <div>
        <ul class="overflow-hidden shadow-sm sm:rounded-lg  mx-auto max-w-7xl px-6 lg:px-8 flex flex-wrap">
            @foreach($podcasts as $podcast)
                <li class="bg-white shadow-sm sm:rounded-lg ml-4 mt-4 p-6">
                    <img class="h-16 w-16 sm:rounded-lg" src="{{ Storage::url($podcast->image)}}" alt="">
                    <div>
                        <h3 class="text-base font-semibold tracking-tight text-gray-900"><a href="{{route('podcasts.show', $podcast)}}"> {{$podcast->name}}</a></h3>
                        <p class="text-gray-400 text-xs">{{$podcast->description}}</p>
                        <audio controls src="{{ Storage::url($podcast->audio )}}"class=" mb-4 mt-4 bg-white overflow-hidden">
                            <source src="{{Storage::url($podcast->audio)}}" class="ml-2">
                        </audio>
                        @can('edit-podcasts', $podcast)
                            <div class="flex items-center">
                                <form action="{{route('podcasts.destroy', $podcast)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button type="submit">Delete</x-primary-button>
                                </form>
                                <x-primary-link :href="route('podcasts.edit', $podcast)" class="ml-4">Edit</x-primary-link>
                            </div>
                        @endcan
                    </div>
                </li>
            @endforeach
            <ul/>
    </div>
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

