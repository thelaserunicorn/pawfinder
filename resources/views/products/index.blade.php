
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Products' }}
            </h2>
        </div>
    </x-slot>
    <!-- component -->

    <section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
@foreach ($products as $product)
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">

            <img class="h-1/2 w-1/2" src="{{ isset($product) ? Storage::url($product->image) : '' }}"  alt="Sunset in the mountains">
            <div class="px-4 py-3 w-72">
                <p class="text-lg font-bold text-black truncate block capitalize">{{$product->name}}</p>
                <div class="flex items-center">
                    <p class="text-rose-400 text-lg font-semibold text-black cursor-auto my-3 ">BDT {{$product->price/100}}</p>
                </div>
                          <div>
        <button class="text-white text-md font-semibold bg-red-400 py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-500 transform-gpu hover:scale-110 ">Buy Now</button>
      </div>
            </div>
        </a>
    </div>
@endforeach
        </section
</x-app-layout>
