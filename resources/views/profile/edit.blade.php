<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg sm:flex">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="py-12 inline-flex sm:max-w-md">
                        <input type='file' id="image-user" accept=".png, .jpg, .jpeg" />
                        <x-user-icon class="border-b-2 "><img src="{{$user->image}}" alt=""></x-user-icon>
                    </div>

                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
