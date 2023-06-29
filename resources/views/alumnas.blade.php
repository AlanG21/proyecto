

@extends('layouts.app')

@section('titulo')
Pagina principal
@endsection

@section('contenido')
Registro de servicios

 <!-- boton para ir a la pagina de grupos -->
<form action="{{ route('grupos') }}" method="GET">
    @csrf
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ver o registrar Grupos
    </button>
</form>

<!-- tabla de servicios -->
  <div class="container grid px-6 mx-auto">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-3/4 mx-auto my-8 border border-black">
                <thead>
                    <tr class="border-b border-black">
                        <th class="px-4  bg-yellow-200 py-3 border-r border-black">id</th>
                        <th class="px-4  bg-yellow-200 py-3 border-r border-black">nombre</th>
                        <th class="px-4  bg-yellow-200 py-3 border-r border-black">apellidos</th>
                        <th class="px-4  bg-yellow-200 py-3 border-r border-black">fecha_nacimiento</th>
                        <th class="px-4  bg-yellow-200 py-3 border-r border-black">grupo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnas as $alumna)
                    <tr class="text-blue-700 dark:text-blue-600 border-b border-black">
                        <td class="px-4 bg-rose-100  py-3 border-r border-black">{{$alumna->id}}</td>
                        <td class="px-4 bg-rose-100 py-3 border-r border-black">{{$alumna->nombre}}</td>
                        <td class="px-4 bg-rose-100 py-3 border-r border-black">{{$alumna->apellido }}</td>
                        <td class="px-4 bg-rose-100 py-3 border-r border-black">{{$alumna->fecha_nacimiento }}</td>
                        <td class="px-4 bg-rose-100 py-3 border-r border-black">{{$alumna->grupo_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- formulario para registrar un servicio -->
<form action="{{route('alumnas')}}" method="POST" novalidate>
    @csrf
    <div class="mb-5">
        <label for="nombre" class="mb-2 black uppercase text-black-500 font-bold">Nombre</label>
        <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" class="border p-3 w-1/3  rounded tg
            @error('nombre')
                border-red-500
            @enderror"
            value="{{old('nombre')}}"
        />
       
        @error('nombre')
            <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="apellido" class="mb-2 black uppercase text-black-500 font-bold">Apellido</label>
        <input id="apellido" name="apellido" type="text" placeholder="Tu apellido" class="border p-3 w-1/3 rounded tg
            @error('apellido')
                border-red-500
            @enderror"
            value="{{old('apellido')}}"
        />
       
        @error('apellido')
            <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="fecha_nacimiento" class="mb-2 black uppercase text-black-500 font-bold">Fecha de nacimiento</label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="Tu fecha de nacimiento" class="border p-3 w-1/6 rounded tg
            @error('fecha_nacimiento')
                border-red-500
            @enderror"
            value="{{old('fecha_nacimiento')}}"
        />
       
        @error('fecha_nacimiento')
            <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="grupo_id" class="mb-2 black uppercase text-black-500 font-bold">Grupo</label>
        <select id="grupo_id" name="grupo_id" class="border p-3 w-1/3 rounded tg
            @error('grupo_id')
                border-red-500
            @enderror">
            <option value="">a que grupo pertenece</option>
            @foreach ($grupos as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
            @endforeach
        </select>

        @error('grupo_id')
            <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <input type="submit" value="Registrar alumno" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-1/3 p-3 text-white rownded-lg"/>

</form>


@endsection

