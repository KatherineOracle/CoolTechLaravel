<x-app-layout>

    <x-slot name="header">
        <h1>Login</h1>
    </x-slot>

    <!-- Login form  -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }} </label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group">
                        <label class="form-check-label" for="remember_me">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span>{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="form-group d-flex gx-5 align-items-center  pt-3 pb-3">

                        <button class="btn me-4 btn-primary ml-3">
                            {{ __('Log in') }}
                        </button>

                        @if (Route::has('password.request'))
                        <div class=" me-4">
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                        @endif
                        @if (Route::has('register'))
                        <div>
                            <a href="{{ route('register') }}">
                                {{ __('Don\'t have an account?') }}
                            </a>
                            <div>
                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
