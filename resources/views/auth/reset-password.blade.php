<x-app-layout>

    <x-slot name="header">
        <h1>Reset password</h1>
    </x-slot>


    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }} </label>

                        <input id="email" class="form-control"  type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }} </label>

                        <input id="password" class="form-control" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }} </label>

                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
