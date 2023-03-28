<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Channels') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">

        <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg uk-grid">
            @foreach($channels as $channel)
                <div>
                    <li class="p-6 text-gray-900">

                        {{--            {{$user->name}})--}}
                        <a href="{{route('channels.show', $channel)}}"> {{$channel->name}} </a>
                        <div class="flex">
                            <div >
                                <form action="{{route('channels.destroy', $channel)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="uk-button uk-button-default" type="submit">Delete</x-primary-button>
                                </form>
                            </div>
                            <div>
                                <form class="ml-3" action="{{route('channels.edit', $channel)}}" method="GET">
                                    @csrf
                                    @method('get')
                                    <x-secondary-button button type="submit" class="uk-button uk-button-primary">Edit User</x-secondary-button>
                                </form>
                            </div>
                        </div>
                        <br>

                        {{--            <a href="{{route('channels.edit-user', $user)}}" >Edit Channel</a>--}}
                    </li>
                </div>
            @endforeach
        </ul>
    </div>

    <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4" action="{{route('channels.create')}}" method="GET">
        @csrf
        @method('get')
        <x-primary-button class="uk-button" type="submit">Add User</x-primary-button>
    </form>
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

