<x-guest-layout>
    <form method="POST" action="{{ route('episodes.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="" name="name" required autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="description" name="description" required autocomplete="new-description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Image')" />
            <input id="description" class="block mt-1 w-full" type="file" name="image" required autocomplete="new-image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Episode path -->
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="description" :value="__('Episode')" />--}}
{{--            <input id="episode" class="block mt-1 w-full" type="file" name="episode" required autocomplete="new-episode" />--}}
{{--            <x-input-error :messages="$errors->get('episode')" class="mt-2" />--}}
{{--        </div>--}}



        <x-primary-button class="ml-4">
            {{ __('Publish Episode') }}
        </x-primary-button>
    </form>
</x-guest-layout>
