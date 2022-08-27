<x-app-layout>

    <x-slot name="header">
        <h1>Register</h1>
    </x-slot>


    <!-- Register form  -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{__('Name') }}</label>

                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>

                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }} </label>

                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                    <div class="form-group d-flex align-items-center mt-4">
                        <button class="btn btn-primary me-4">
                            {{ __('Register') }}
                        </button>

                        <a href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
