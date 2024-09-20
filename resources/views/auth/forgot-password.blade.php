<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="login100-form validate-form flex-sb flex-w" id="loginform" name = "loginForm" role="form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="wrap-input100 validate-input" data-validate = "Username is required">
            <x-text-input class="input100" id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error class="focus-input100" :messages="$errors->get('email')" />
            
		</div>
        <div class="block mt-4">
            <a class="txt2 bo1 m-l-5" href="{{ route('login') }}">
                Ingresar
            </a>
        </div>
        <div class="container-login100-form-btn m-t-17">
            <x-primary-button class="login100-form-btn" >
                Enlace para restablecer contraseña de correo electrónico
            </x-primary-button>
		</div>
    </form>
</x-guest-layout>
