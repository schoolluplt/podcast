<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Episode') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">

        <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg uk-grid">
            @foreach($episodes as $episode)
                <div>
                    <li class="p-6 text-gray-900">
                        <a href="{{route('episodes.show', $episode)}}"> {{$episode->name}} </a>
                    </li>
                </div>
            @endforeach
        </ul>
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

