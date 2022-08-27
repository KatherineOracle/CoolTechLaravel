<x-app-layout>

<x-slot name="header">
        <h1>Forgot password</h1>
    </x-slot>


        <p class="lead">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>



        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }} </label>

                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <div class="form-group">
                <button class="btn  btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

</x-app-layout>
