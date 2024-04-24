<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($post) ? 'Send Request' : 'Send Request' }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{route('sendrequest.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div class="flex flex-wrap justify-between">
    <div class="w-5/12 pr-2">
        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$animal->name ?? old('name')" required autofocus />
        </div>
    </div>
    <div class="w-1/4 px-2">
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" required autofocus />
        </div>
    </div>
    <div class="w-1/6 pr-2">
        <div>
            <x-input-label for="animal_name" value="Animal Name" />
            <x-text-input id="animal_name" name="animal_name" type="text" class="mt-1 block w-full" required autofocus />
        </div>
    </div>

    <div class="w-1/6 px-2">
        <div>
            <x-input-label for="animal_id" value="Animal ID" />
            <x-text-input id="animal_id" name="animal_id" type="number" class="mt-1 block w-full" required autofocus />
        </div>
    </div>


                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Send Request') }}</x-primary-button>
                        </div>
                        </div>














</x-app-layout>


