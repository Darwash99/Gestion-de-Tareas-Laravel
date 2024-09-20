<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="login100-form validate-form flex-sb flex-w" id="loginform" name = "loginForm" role="form" method="POST" action="{{ route('login') }}">
        @csrf
		<span class="login100-form-title p-b-15">	
            <img src="{{asset('/img/sin_logo.png')}}" alt="FacturaCode"  width="200" heigth="200"/>
		</span>
		<div class="p-t-31 p-b-9">
			<span class="txt1">
				Correo Electr&oacute;nico
			</span>
		</div>
		<div class="wrap-input100 validate-input" data-validate = "Username is required">
            <x-text-input class="input100" id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" id="login-username"/>
            <x-input-error  :messages="$errors->get('email')"  />
		</div>
					
		<div class="p-t-13 p-b-9">
			<span class="txt1">
				Contraseña
			</span>
            @if (Route::has('password.request'))
                <a class="txt2 bo1 m-l-5" href="{{ route('password.request') }}">
                    ¿Olvidaste tu Contraseña?
                </a>
            @endif
		</div>
		<div class="wrap-input100 validate-input" data-validate = "Password is required">

            <x-text-input id="password" class="input100"
                            type="password"
                            name="password"
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')"  />
		</div>
        <div class="block mt-4">
            <a class="txt2 bo1 m-l-5" href="{{ route('register') }}">
                Registrarse
            </a>
        </div>

		<div class="container-login100-form-btn m-t-17">
            <x-primary-button class="login100-form-btn" >
                Iniciar Sesi&oacute;n
            </x-primary-button>
		</div>
	</form>
</x-guest-layout>
