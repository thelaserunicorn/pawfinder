<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-12 font-semibold text-xl text-gray-800 leading-tight">
            {{ $animal->name  }}
        </h2>
    </x-slot>



    <div class="bg-white py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ Storage::url($animal->featured_image) }}" alt="{{ $animal->name }}" srcset="">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2 m-2">

                                     @if ($animal->user->is(auth()->user()))
                                    <form method="post" action="{{ route('animals.destroy', $animal->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                    <button class="border-solid border-2 border-rose-600 w-full text-rose-600 py-2 px-4 rounded-lg font-bold hover:bg-rose-600 hover:text-white">Delete</a>
                                    </form>
                                                                @endif
                    </div>

                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-rose-600 mb-2">{{$animal->name}}</h2>
                <p class="text-slate-600 text-sm">
                    Posted At:
                </p>
                <p class="text-slate-600 text-sm mb-4">
                            {{ $animal->created_at }}
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-slate-600">ID:</span>
                        <span class="font-bold text-slate-800">{{$animal->id}}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-slate-600">Age:</span>
                        <span class="text-slate-600">{{$animal->age}}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-slate-600">Gender:</span>
                        <span class="text-slate-600">{{$animal->gender}}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-slate-600">Weight: </span>
                        <span class="text-slate-600">{{$animal->weight}}</span>
                        <span class="text-slate-600">KG</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-slate-600">Breed:</span>
                        <span class="text-slate-600">{{$animal->breed}}</span>
                    </div>
                </div>
                <div class="mb-4">
                </div>
                <div class="mb-4">
                </div>
                <div>
                    <span class="font-bold text-slate-600">vet?:</span>
                    <p class="text-slate text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        sed ante justo. Integer euismod libero id mauris malesuada tincidunt. Vivamus commodo nulla ut
                        lorem rhoncus aliquet. Duis dapibus augue vel ipsum pretium, et venenatis sem blandit. Quisque
                        ut erat vitae nisi ultrices placerat non eget velit. Integer ornare mi sed ipsum lacinia, non
                        sagittis mauris blandit. Morbi fermentum libero vel nisl suscipit, nec tincidunt mi consectetur.
                    </p>
                </div>

                    <div class="mt-10">
                    <a href="{{ route('animals.index') }}" class="w-full bg-rose-600 text-white py-2 px-4 rounded-full font-bold hover:bg-rose-700">Go Back</a>
                                     @if ($animal->user->is(auth()->user()))

                                    <a href="{{ route('animals.edit', $animal->id) }}" class="w-full bg-rose-600 text-white py-2 px-4 rounded-full font-bold hover:bg-rose-700">Edit</a>

                                    <a href="{{ route('vet.create') }}" class="w-full bg-rose-600 text-white py-2 px-4 rounded-full font-bold hover:bg-rose-700">Add Vet</a>
                                                                @endif
                    <a href="{{ route('sendrequest.create') }}" class="w-full bg-rose-600 text-white py-2 px-4 rounded-full font-bold hover:bg-rose-700">Send Request</a>
                        </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
