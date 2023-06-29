

@extends('layouts.app')

@section('titulo')
Pagina principal
@endsection

@section('contenido')
Registro de grupos

<!-- boton para ir a la pagina de alumnas -->

<form action="{{ route('alumnas') }}" method="GET">
    @csrf
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ver o registrar Alumnas
    </button>
</form>


<!-- tabla de grupos -->
<div class="container grid px-6 mx-auto">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-3/4 mx-auto my-8 border border-black">
                <thead>
            
                    <tr class="border-b border-black">
                        <th class="px-4 bg-yellow-200  py-3 border-r border-black">id</th>
                        <th class="px-4 bg-yellow-200  py-3 border-r border-black">nombre del grupo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- iterar entre los grupos -->
                    @foreach ($grupos as $grupo)
                    <tr class="text-gray-700 dark:text-black-400 border-b border-black">
                        <td class="px-4 py-3 text-blue-600 bg-rose-100 border-r border-black">{{$grupo->id}}</td>
                        <td class="px-4 py-3 bg-rose-100 border-r border-black">{{$grupo->nombre}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- formulario para registrar un grupo -->
<form action="{{route('grupos')}}" method="POST" novalidate>
    @csrf
    <div class="mb-5">
        <label for="grupo" class="mb-2 black uppercase text-black-500 font-bold">Nombre</label>
        <input id="grupo" name="grupo" type="text" placeholder="Nombre" class="border p-3 w-1/3 rounded tg
            @error('grupo')
                border-red-500
            @enderror"
            value="{{old('grupo')}}"
        />
    
        @error('grupo')
            <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <input type="submit" value="Registrar grupo" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-1/3 p-3 text-white rownded-lg"/>

</form>


@endsection

