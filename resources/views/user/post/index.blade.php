@section('title', 'Artikel')

<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-start items-center gap-2 flex-row">
                <x-form method="GET" action="{{ route('post.index') }}">
                    <x-input.text-input type="search" name="search" placeholder="Cari..." :value="$search" />

                    <x-button.primary-button type="submit">Cari</x-button.primary-button>
                </x-form>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-6 p-4">
                @forelse ($posts as $post)
                    <x-card.card-image title="{{ $post->title }}"
                        image="{{ $post->image ? 'storage/post/' . $post->image : 'assets/images/no-image.png' }}"
                        class="static">
                        <p>{{ $post->exceprt }}</p>
                        <p class="font-bold"><span class="badge badge-primary">{{ $post->created_at }}</span></p>
                        <div class="card-actions md:justify-end justify-start items-center">
                            <div class="badge badge-outline">{{ $post->user->name }}</div>
                            <div class="badge badge-outline">{{ $post->category->name }}</div>
                        </div>
                        <a href="{{ url('/' . $post->slug) }}" class="mt-3">
                            <x-button.primary-button type="submit"
                                class="btn-md text-base-100 w-full">Lihat</x-button.primary-button>
                        </a>
                    </x-card.card-image>
                @empty
                    <x-card.card-default class="static md:col-span-2 lg:col-span-3 col-span-1">
                        <div class="flex flex-col w-full border-opacity-50">
                            <div class="grid h-20 card bg-base-300 rounded-box place-items-center">Data Tidak Ditemukan
                            </div>
                        </div>
                    </x-card.card-default>
                @endforelse
            </div>
            <div class="join">
                {{ $posts->appends(['search' => $search])->links() }}
            </div>

        </div>
    </div>
</x-guest-layout>
