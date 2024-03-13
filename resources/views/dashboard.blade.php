<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-semibold mb-8 text-center">Descubre la Libertad de Conducir con Nosotros</h1>
                <p class="mb-4">En <span class="font-semibold">Ayoub Renting</span>, nos dedicamos a ofrecerte una experiencia de movilidad sin preocupaciones. Somos una empresa de car renting comprometida con proporcionarte la libertad de explorar, sin las cargas asociadas a la propiedad de un vehículo.</p>


                <h2 class="text-2xl font-semibold mb-4">Por Qué Elegirnos</h2>
                <ul class="list-disc ml-6 mb-4">
                    <li class="mb-2">Variedad de Vehículos: Desde coches compactos hasta SUVs espaciosos, ofrecemos una amplia selección de vehículos para adaptarnos a tu estilo de vida.</li>
                    <li class="mb-2">Flexibilidad: Con opciones de arrendamiento a corto y largo plazo, así como planes personalizados, te ofrecemos la flexibilidad que necesitas para satisfacer tus necesidades de movilidad.</li>
                    <li class="mb-2">Servicio Personalizado: Nuestro equipo dedicado está aquí para ayudarte en cada paso del proceso, desde la selección del vehículo hasta la entrega y más allá.</li>
                </ul>

                <p class="mb-4">Únete a Nosotros Hoy y descubre una nueva forma de conducir con <span class="font-semibold">Ayoub Renting</span>. Explora nuestros servicios de car renting y déjanos ayudarte a encontrar el vehículo perfecto para ti. ¡Empieza tu viaje hacia la libertad de conducir hoy mismo!</p>
            </div>
        </div>
    </div>
</div>


<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-8 text-center">Coches Disponibles</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($coches as $coche)
        <div class="rounded-lg shadow-md hover:bg-gray-100">
            <div class="p-4">
                <img class="mx-auto h-48 object-cover" src="{{ asset('/img/' . $coche->id . '.jpg') }}" alt="{{ $coche->matricula }}">
                <p class="text-lg font-semibold text-center mt-4">{{ $coche->tipo }}</p>
                <p class="text-lg font-semibold text-center mt-4">{{ $coche->etiqueta }}</p>
                <p class="text-lg font-semibold text-center mt-4">{{ $coche->matricula }}</p>
            </div>
            <div class="p-4 flex justify-center">

                <a href="{{ route('page.suscripcion', ['coche_id' => $coche->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Suscribirse</a>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
</x-app-layout>
