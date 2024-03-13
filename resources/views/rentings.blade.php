<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Coches Suscritos') }}
        </h2>
    </x-slot>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8">Coches Suscritos</h1>

        @if($suscripciones->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($suscripciones as $coche)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <img class="w-full h-64 object-cover" src="{{ asset('/img/' . $coche->id . '.jpg') }}" alt="{{ $coche->matricula }}">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-2">{{ $coche->tipo }}</h2>
                    <p class="text-sm text-gray-600 mb-4">{{ $coche->etiqueta }}</p>
                    <p class="text-sm text-gray-600">Matrícula: {{ $coche->matricula }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-lg text-center text-gray-600">No tienes coches suscritos.</p>
        @endif
    </div>

    @endsection
</x-app-layout>
