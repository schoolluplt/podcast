<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast') }}
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('message'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div>
        <p class="font-sans text-xl text-gray-700 leading-tight">
            {{__('The Podcast app lets you find your favorite podcasts. Lovers of cultural programs, or simply curious about the world around you, Podcast allows you to discover the latest innovations in the digital world.Start listening to podcasts now by ')}}<a class="underline" href="{{ route('login') }}">logging in </a>
        </p>
    </div>
</x-guest-layout>
