<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Animals' }}
            </h2>
            <a href="{{ route('animals.create') }}" class="bg-rose-600 text-white px-4 py-2 rounded-md">ADD</a>
        </div>
    </x-slot>

    <section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
    @foreach($animals as $animal)




<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow w-full duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
        <img class="h-64 w-full object-cover rounded-t-lg" src="{{ isset($animal) ? Storage::url($animal->featured_image) : '' }}" alt="" />
    </a>
    <div class="p-5 w-full">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$animal->name}}</h5>
        </a>
        <p class="mb-3 font-bold text-slate-800">Posted At: {{$animal->created_at}}</p>
        <p class="mb-3 font-normal text-slate-700">Age: {{$animal->age}}</p>
        <p class="mb-3 font-normal text-gray-700">Weight (kg): {{$animal->weight}}</p>
        <p class="mb-3 font-normal text-gray-700">Breed: {{$animal->breed}}</p>
        <a href="{{ route('animals.show', $animal->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Learn More </a>

        <a href="{{ route('animals.show', $animal->id) }}" class="border-solid border-2 border-rose-600 w-full text-rose-600 py-2 px-4 rounded-lg font-bold hover:bg-rose-600 hover:text-white">
                    Send Request </a>
    </div>
</div>


    @endforeach
</section>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Image</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Name</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Updated At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our post data --}}
                            @foreach ($animals as $animal)






                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">    <img class="w-48 rounded-lg" src="{{ isset($animal) ? Storage::url($animal->featured_image) : '' }}"  alt="Sunset in the mountains"></td>

                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $animal->name }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $animal->created_at }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $animal->updated_at }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('animals.show', $animal->id) }}" class="bg-blue-500 border-blue-500 hover:bg-blue-500 hover:text-white text-white px-4 py-2 rounded-md">Learn More</a>
                                    <a href="{{ route('animals.show', $animal->id) }}" class="border border-green-500 hover:bg-green-500 hover:text-white text-green-500 px-4 py-2 rounded-md">Send Request</a>
                                     @if ($animal->user->is(auth()->user()))

                                    <a href="{{ route('animals.edit', $animal->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                    {{-- add delete button using form tag --}}
                                    <form method="post" action="{{ route('animals.destroy', $animal->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                                    </form>
                                                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
