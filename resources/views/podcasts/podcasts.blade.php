<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">

        <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            @foreach($podcasts as $podcast)
                <div class="flex">
                    <li class="p-6 text-gray-900">
                        <a href="{{route('podcasts.show', $podcast)}}"> {{$podcast->name}} </a>
                    </li>
                    @can('edit-podcasts', $podcast)
                        <div>
                            <form action="{{route('podcasts.destroy', $podcast)}}" method="POST">
                                @csrf
                                @method('delete')
                                <x-primary-button type="submit">Delete</x-primary-button>
                            </form>
                        </div>
                        <div>
                            <x-primary-link :href="route('podcasts.edit', $podcast)">
                                Edit
                            </x-primary-link>
                        </div>
                    @endcan
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

