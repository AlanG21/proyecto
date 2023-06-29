<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro Grupos y alumnos - @yield('titulo')</title>
        @vite('resources/css/app.css')
       

    </head>
    <body class="bg-gray-300" >
        <header class="bg-green-500  p-5 border-b  shadow">

           <div class="container mx-auto flex justify-between items-center">


            <h1 class=" text-2xl font-mono ">
                Registro de grupos y alumnos- examen - 2030280
            </h1>


    

             @auth
             <nav class="flex gap-2  items-center">



                <form method="POST" action="{{ route('logout')}}">
                    @csrf

                <button type="submit"  class=" border font-bold uppercase text-black">
                    cerrar sesion</button>
                    </form>
            </nav>
             @endauth

             @guest
             <nav class="flex gap-2  items-center">


                <a class="font-bold uppercase text-black " href="{{ route('login')}}">
                    Login</a>
                <a href="{{route('register')}}" class="font-bold uppercase text-black">
                    Crear Cuenta</a>
            </nav>
                
             @endguest

            


           </div>

        </header>

        
        <main class="container mx-auto mt-10">

        <h2 class=" font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        
        @yield('contenido')

        </main>

   

    </body>
    
</html>