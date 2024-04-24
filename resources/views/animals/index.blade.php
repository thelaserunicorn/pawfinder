<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Animals' }}
            </h2>
            <a href="{{ route('animals.create') }}" class="bg-rose-600 text-white px-4 py-2 rounded-md">Add Animal</a>
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
        <p class="mb-3 font-bold text-slate-800">Animal ID: {{$animal->id}}</p>
        <p class="mb-3 font-normal text-slate-700">Age: {{$animal->age}}</p>
        <p class="mb-3 font-normal text-gray-700">Weight (kg): {{$animal->weight}}</p>
        <p class="mb-3 font-normal text-gray-700">Breed: {{$animal->breed}}</p>
        <a href="{{ route('animals.show', $animal->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Learn More </a>

        <a href="{{route('sendrequest.create')}}" class="border-solid border-2 border-rose-600 w-full text-rose-600 py-2 px-4 rounded-lg font-bold hover:bg-rose-600 hover:text-white">
                    Send Request </a>
    </div>
</div>


    @endforeach
</section>



</x-app-layout>
