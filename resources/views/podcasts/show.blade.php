<x-app-layout>

    <h2>{{ session('message') }}</h2>

    <br>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">
    <h1>{{$podcast->name}}</h1>
    <h2>{{$podcast->user->name}}</h2>
    <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <li>{{$podcast->name}}</li>
        <li>{{$podcast->description}}</li>
        <x-user-icon src="{{ Storage::url($podcast->image)}}"></x-user-icon>
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
