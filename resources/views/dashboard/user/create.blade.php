@section('title', 'Tambah Data User')

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
                        <x-input.input-label for="email" :value="__('Email')" />
                        <x-input.text-input id="email" class="mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="email" />
                        <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input.input-label for="password" :value="__('Password')" />
                        <x-input.text-input id="password" class="mt-1 w-full" type="password" name="password"
                            :value="old('password')" required autofocus autocomplete="password" />
                        <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input.input-label for="role" :value="__('Role')" />
                        <x-input.select-input id="role" class="select2 mt-1 w-full" name="role" required
                            autofocus autocomplete="role">
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ old('role') == $role->name ? ' selected' : ' ' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </x-input.select-input>
                        <x-input.input-error :messages="$errors->get('role')" class="mt-2" />
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
