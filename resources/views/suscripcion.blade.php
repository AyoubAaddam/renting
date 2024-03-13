<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suscripción') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8 text-center">Coches Selecionado</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <div class="rounded-lg shadow-md hover:bg-gray-100">
                <div class="p-4">
                    <img class="mx-auto h-48 object-cover" src="{{ asset('/img/' . $coches->id . '.jpg') }}" alt="{{ $coches->matricula }}">
                    <p class="text-lg font-semibold text-center mt-4">{{ $coches->tipo }}</p>
                    <p class="text-lg font-semibold text-center mt-4">{{ $coches->etiqueta }}</p>
                    <p class="text-lg font-semibold text-center mt-4">{{ $coches->matricula }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('create.suscripcion') }}">
                        @csrf
                        <input type="hidden" name="coche_id" value="{{ $coches->id }}">

                        <!-- Campo de suscripción -->
                        <div class="mt-4">
                            <label for="subscripcion" class="block text-sm font-medium text-gray-700">{{ __('Tipo de Suscripción') }}</label>
                            <select id="subscripcion" name="subscripcion" class="block mt-1 w-full form-select" required autofocus>
                                <option value="Largo plazo">Largo plazo ( 2 - 5 años)</option>
                                <option value="Medio plazo">Medio plazo ( 1 - 2 años)</option>
                                <option value="Corto Plazo">Corto Plazo  (menos de un año)</option>
                            </select>
                        </div>

                        <!-- Campo de usuario -->
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Suscribirse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
