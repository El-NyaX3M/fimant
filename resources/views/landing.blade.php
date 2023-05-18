<x-app-layout>
    <body class="d-flex flex-column">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,600;0,900;1,500;1,700&display=swap');
    </style>
    <div class="bg-blur-landing">a</div>
    <div class="info">
        <div class="row justify-content-center p-5">
            <div class="col-lg-6 col-xl-7"></div>
            <div class="col-lg-6 col-xl-5">
                <h1 class="text-black" style="font-size: 5em; font-family: 'Libre Franklin', sans-serif;">Figman´t</h1>
                <p class="text-left ps-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti asperiores dolorem vel non saepe commodi eum incidunt perspiciatis consequuntur ipsa.</p>
                <div class="row">
                    <div class="col-lg-6 col-xl-6"><a href="{{url('login')}}"><button class="btn btn-bd-primary btn-lg fw-bold">Iniciar sesión</button></a></div>
                    <div class="col-lg-6 col-xl-6"><a href="{{url('register')}}"><button class="btn btn-bd-primary btn-lg fw-bold">Registrarse</button></a></div>
                </div>
                
            </div>
        </div>
    </div>
    
    
</x-app-layout>
