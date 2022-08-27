<x-app-layout>

<x-slot name="header">
        <h1>Verify email</h1>
    </x-slot>



        <p class="lead">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
</p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-success">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 d-flex">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="me-4">
                    <button class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-secondary">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

</x-app-layout>
