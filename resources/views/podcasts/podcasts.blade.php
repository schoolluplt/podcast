<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcasts') }}
        </h2>
    </x-slot>




    <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
            @foreach($podcasts as $podcast)

            <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="{{$podcast->image}}" alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900"> <a href="{{route('podcasts.show', $podcast)}}"> {{$podcast->name}} </a></h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">{{$podcast->description}}</p>
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
                    </div>
                </li>

                <!-- More people... -->
            </ul>
            @endforeach
        </div>
    </div>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">
        <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

