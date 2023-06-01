@extends('layouts.app')

@section('titulo')
Registro de servicios
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-6/12 lg:w-4/12 md:flex">
           
            <div class="md:w-1/12 lg:w-6/12 px-5">
                
                <p class="text-gray-800 text-2x1">Usuario: {{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-10">
        <div class="w-full md:w-9/12">
            <form action="{{ route('storeService') }}" method="POST" class="mb-5">
                @csrf
                <div class="mb-4">
                    <label for="short_description" class="  block text-black-800 font-bold mb-2">Descripción Corta:</label>
                    <input type="text" name="short_description" id="short_description" class="border border-green-600 rounded-md p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="long_description" class="block text-black-800 font-bold mb-2">Descripción Larga:</label>
                    <textarea name="long_description" id="long_description" rows="3" class="border border-green-600 rounded-md p-2 w-full" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-black-800 font-bold mb-2">Precio:</label>
                    <input type="number" name="price" id="price" class="border border-green-600 rounded-md p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="features" class="block text-black-800 font-bold mb-2">Características:</label>
                    <textarea name="features" id="features" rows="3" class="border border-green-600 rounded-md p-2 w-full" required></textarea>
                </div>
                <div class=" flex justify-end">
                    <button type="submit" class="bg-green-800 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Añadir Servicio</button>
                </div>
            </form>

            <table class=" w-full bg-white border rounded-full border-gray-300 ">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">ID</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Descripción Corta</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Descripción Larga</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Precio</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Fecha de Registro</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Características</th>
                        <th class="px-6 py-3 bg-yellow-200 text-black-600 font-semibold uppercase text-sm">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td class=" bg-rose-100 px-6 py-4">{{ $service->id }}</td>
                        <td class="bg-rose-100 px-6 py-4">{{ $service->short_description }}</td>
                        <td class="bg-rose-100 px-6 py-4">{{ $service->long_description }}</td>
                        <td class="bg-rose-100 px-6 py-4">{{ $service->price }}</td>
                        <td class="bg-rose-100 px-6 py-4">{{ $service->registration_date }}</td>
                        <td class="bg-rose-100 px-6 py-4">{{ $service->features }}</td>
                        <td class="bg-rose-100 px-6 py-4">
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-600 transition-colors text-white px-4 py-2 rounded-lg">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
