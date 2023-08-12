<x-app-layout>

    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}


    <form action="{{ route('password.email') }}" method="post" class="w-[400px] flex flex-col mx-auto p-6 my-16">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
          Enter your Email to reset password
        </h2>
        <p class="text-center text-gray-500 mb-6">
          or
          <a
          href="{{ route('login') }}"
          class="text-purple-600 hover:text-purple-500"
          >login with existing account</a
          >
        </p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-3 w-full">
            <x-text-input
            id="email"
            type="email"
            name="email"
            :errors="$errors"
            :value="old('email')"
            placeholder="Your email address"
            required
            autofocus
            />
        </div>
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 mb-3" /> --}}
        <button
          class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
          Submit
        </button>
      </form>
    <!-- Session Status -->

    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}


</x-app-layout>
