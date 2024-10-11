@section('title', 'Daftar Akun')

<x-guest-layout>
    <div class="py-12">
        <div class="w-2/3 mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <x-alert.error :errors="$errors->all()" />
            @endif

            <x-card.card-default class="static mt-2">
                <x-form action="{{ route('register') }}" class="md:grid md:grid-cols-2 gap-4"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Photo -->
                    <div>
                        <x-input.input-label for="photo" :value="__('Foto')" />
                        <x-input.input-file id="photo" class="mt-1 w-full" type="file" name="photo"
                            :value="old('photo')" autofocus autocomplete="photo" />
                    </div>

                    <!-- Full Name -->
                    <div>
                        <x-input.input-label for="name" :value="__('Nama Lengkap')" />
                        <x-input.text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="Fitra Fajar" />
                    </div>

                    <!-- Username -->
                    <div class="mt-4">
                        <x-input.input-label for="username" :value="__('Username')" />
                        <x-input.text-input id="username" class="block mt-1 w-full" type="username" name="username"
                            :value="old('username')" required autocomplete="username" placeholder="vzar" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input.input-label for="password" :value="__('Password')" />

                        <x-input.text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input.input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                        <x-input.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4 col-span-2">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}">
                                <x-button.link-button type="button">
                                    {{ __('Sudah Daftar?') }}
                                </x-button.link-button>
                            </a>
                        @endif

                        <x-button.primary-button class="ms-4">
                            {{ __('Daftar') }}
                        </x-button.primary-button>
                    </div>
                </x-form>
            </x-card.card-default>
        </div>
    </div>
</x-guest-layout>
