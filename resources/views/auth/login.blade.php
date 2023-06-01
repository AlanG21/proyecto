@extends('layouts.app')

@section('titulo')
Iniciar sesion
@endsection

@section('contenido')

    

<div class="md:flex md:justify-center md:gap-10 md:items-center "> 
  

    <div class="  md:w-10/12 bg-green-100 p-6 rounded leading-8 shadow-xl"  >
    
        <form method="POST" action="{{route('login')}}" novalidate>
            
         @csrf
            
         @if(session('mensaje'))
            <p class="bg-red-600 text-white my-2 rouded-lg text-sm p-2 text-center">
                {{ session('mensaje') }}
            </p>  
         @endif
            <div class=" mb-5">
                <label for ="email" class="mb-2 block uppercase text-black-500 font-bold">
                    EMAIL
                </label>
                <input 
                id="email"
                name="email"
                type="text"
                placeholder="Tu Email de registro"
                class="border p-3 min-w-full rounded-lg @error('email') border-red-500
                @enderror"

                value="{{old('email')}}"
                />
                @error('email')
                <p class="bg-red-600 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>                    
            @enderror

            <div class=" mb-5">
                <label for ="password" class="mb-2 block uppercase black-gray-500 font-bold">
                    Password
                </label>
                <input 
                id="password"
                name="password"
                type="password"
                placeholder="password de registro"
                class="border p-3 min-w-full rounded-lg"

                />
                @error('password')
                <p class=" bg-red-600 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>                    
            @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember"><label class=" text-gray-500 text-sm "> Mantener mi sesion abierta</label>
            </div>
           

            <input type="submit"
            value="iniciar sesion"
            class=" animate-pulse bg-green-800 hover:bg-green-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-black rounded-xl"
            />





        </form>

    </div>

</div>


@endsection