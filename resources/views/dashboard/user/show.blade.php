@section('title', 'Detail Author')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card.card-default class="static">

                <div class="flex justify-between items-center">
                    <a href="{{ route('dashboard.user.edit', $user->username) }}"><x-button.info-button type="button"
                            class="btn-sm text-white"><i
                                class="fa-regular fa-pen-to-square"></i>Edit</x-button.info-button></a>
                    <x-form action="{{ route('dashboard.user.destroy', $user->username) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <x-button.danger-button type="submit" class="btn-sm text-white"
                            onclick="return confirm('Kamu yakin?')"><i
                                class="fa-regular fa-trash-can"></i>Hapus</x-button.danger-button>
                    </x-form>
                </div>

                <div class="stats shadow">

                    <div class="stat place-items-center">
                        <div class="stat-title text-lg">Informasi</div>
                        <div class="stat-value text-base">{{ $user->name }} ({{ $user->username }})</div>
                        <div class="stat-desc">{{ $user?->description ?? '-' }}
                        </div>
                    </div>

                    @if ($user->photo)
                        <div class="stat place-items-center">
                            <div class="stat-title text-lg">Foto</div>
                            <div class="stat-desc">
                                <div class=" flex justify-center">
                                    <div class="w-32 rounded">
                                        <img src="{{ asset('storage/photo/' . $user->name . '/' . $user->photo) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="stat place-items-center">
                        <div class="stat-title text-lg">Status</div>
                        <div class="stat-value text-base">Author</div>
                        <div class="stat-desc">{{ $user->created_at }}</div>
                    </div>

                </div>

            </x-card.card-default>
        </div>
    </div>

</x-app-layout>
