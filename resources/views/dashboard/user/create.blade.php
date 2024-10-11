@section('title', 'Tambah Data Author')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card.card-default class="static">
                <a href="{{ route('dashboard.user.index') }}">
                    <x-button.info-button>
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </x-button.info-button>
                </a>

                <x-form action="{{ route('dashboard.user.store') }}" class="md:grid md:grid-cols-2 gap-4"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="mt-4">
                        <x-input.input-label for="name" :value="__('Nama Lengkap')" />
                        <x-input.text-input id="name" class="mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input.input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input.input-label for="username" :value="__('Username')" />
                        <x-input.text-input id="username" class="mt-1 w-full" type="text" name="username"
                            :value="old('username')" required autofocus autocomplete="username" />
                        <x-input.input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input.input-label for="password" :value="__('Password')" />
                        <x-input.text-input id="password" class="mt-1 w-full" type="password" name="password"
                            :value="old('password')" required autofocus autocomplete="password" />
                        <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="col-span-2">
                        <x-button.primary-button type="submit">
                            {{ __('Simpan') }}
                        </x-button.primary-button>
                    </div>

                </x-form>
            </x-card.card-default>
        </div>
    </div>
</x-app-layout>
