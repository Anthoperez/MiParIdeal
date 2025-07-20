<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" class="form-label" style="color: #555; font-weight: 500;" />
            <x-text-input id="name" class="block mt-1 w-full form-control @error('name') is-invalid @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="border-radius: 5px; border: 1px solid #ced4da;" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 invalid-feedback" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" style="color: #555; font-weight: 500;" />
            <x-text-input id="email" class="block mt-1 w-full form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autocomplete="username" style="border-radius: 5px; border: 1px solid #ced4da;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 invalid-feedback" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" class="form-label" style="color: #555; font-weight: 500;" />
            <x-text-input id="password" class="block mt-1 w-full form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" style="border-radius: 5px; border: 1px solid #ced4da;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 invalid-feedback" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" style="color: #555; font-weight: 500;" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" style="border-radius: 5px; border: 1px solid #ced4da;" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 invalid-feedback" />
        </div>

        <!-- Role -->
        <div class="mb-3">
            <x-input-label for="role" :value="__('Tipo de usuario')" class="form-label" style="color: #555; font-weight: 500;" />
            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required style="border-radius: 5px; border: 1px solid #ced4da;">
                <option value="comprador" {{ old('role') == 'comprador' ? 'selected' : '' }}>Comprador</option>
                <option value="taller" {{ old('role') == 'taller' ? 'selected' : '' }}>Taller</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2 invalid-feedback" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-decoration-none" href="{{ route('login') }}" style="color: #007bff; font-weight: 500;">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 5px; padding: 10px 20px;">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>