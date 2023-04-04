<x-guest-layout>
    <form method="POST" action="{{ route('podcasts.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="" name="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="description" name="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="audio" :value="__('Audio')" />
            <input id="audio" class="block mt-1 w-full" type="file" name="audio" accept="audio/*"/>
            <x-input-error :messages="$errors->get('audio')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Publish podcast') }}
        </x-primary-button>
    </form>
</x-guest-layout>
