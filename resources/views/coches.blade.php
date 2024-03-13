@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-8 text-center">Coches Disponibles</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($coches as $coche)
        <div class="rounded-lg shadow-md hover:bg-gray-100">
            <div class="p-4">
                <img class="mx-auto h-48 object-cover" src="{{ asset('/img/' . $coche->id . '.jpg') }}" alt="{{ $coche->matricula }}">
                <p class="text-lg font-semibold text-center mt-4">{{ $coche->matricula }}</p>
            </div>
            <div class="p-4 flex justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Suscribirse</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
