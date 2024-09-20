<x-guest-layout>
    <style>
        .input100 {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Espaciado interno */
            border: 1px solid #ccc; /* Borde gris */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente */
            transition: border-color 0.3s; /* Transición suave para el borde */
        }

        .input100:focus {
            border-color: #007bff; /* Cambiar el color del borde al enfocar */
            outline: none; /* Quitar el borde de enfoque predeterminado */
        }
    </style>
    <form class="login100-form validate-form flex-sb flex-w" id="loginform" name = "loginForm" role="form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="Nombre" />
            <x-text-input id="name" class="input100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="Correo Electronico" />
            <x-text-input id="email" class="input100" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="Contraseña" />

            <x-text-input id="password" class="input100"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="Confirmar Contraseña" />

            <x-text-input id="password_confirmation" class="input100"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="container-login100-form-btn m-t-17">
            <div class="block mt-4" style="font-size:50px; text-alig:center">
                <a class="txt2 bo1 m-l-5" href="{{ route('login') }}" style="font-size:20px; text-alig:center">
                    Ingresar
                </a>
            </div>
            <x-primary-button class="login100-form-btn" >
                Registrarse
            </x-primary-button>
		</div>
    </form>
</x-guest-layout>
