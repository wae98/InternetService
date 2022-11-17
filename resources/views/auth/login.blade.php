<x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <img src="{{asset('vendor/adminlte/dist/img/AdminLTELogo.png')}}"  width="150px" alt="" class="img">
            </x-slot>
    
            <x-jet-validation-errors class="mb-4" />
    
            @if (session('error'))
                <div class="mb-4 font-medium text-sm text-red-600">
                    {{ session('error') }}
                </div>
            @endif
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <div>
                    <x-jet-label for="auth" value="{{ __('Usuario o Correo Electronico') }}" />
                    <x-jet-input id="auth" class="block mt-1 w-full" type="text" name="auth" :value="old('auth')" required autofocus />
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
    
                
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <x-jet-button class="ml-4">
                        {{ __('Iniciar Sesión') }}
                    </x-jet-button>
                </div>
            </form>
            
        </x-jet-authentication-card>   
</x-guest-layout>
