<x-app-layout>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" value="{{__('Password') }}" />

                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="form-group">
                        <x-button>
                            {{ __('Confirm') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
