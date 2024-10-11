@section('title', 'Detail Postingan / Artikel')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full">
                <div class="mt-3 col-span-2 p-2">
                    <div class="flex justify-start items-center md:space-x-4">
                        <h1 class="font-bold md:text-xl text-lg">{{ $post->title }}</h1>
                        <a href="{{ route('dashboard.post.edit', $post->slug) }}"><x-button.info-button type="button"
                                class="btn-sm text-white"><i
                                    class="fa-regular fa-pen-to-square"></i>Edit</x-button.info-button></a>
                        <x-form action="{{ route('dashboard.post.destroy', $post->slug) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <x-button.danger-button type="submit" class="btn-sm text-white"
                                onclick="return confirm('Kamu yakin?')"><i
                                    class="fa-regular fa-trash-can"></i>Hapus</x-button.danger-button>
                        </x-form>
                    </div>
                    <x-card.card-default class="static">
                        <img src="{{ $post->image ? asset('storage/post/' . $post->image) : asset('assets/images/no-image.png') }}"
                            alt="{{ $post->slug }}" class="w-full rounded">
                        <div class="md:flex justify-between items-center">
                            <div>
                                <i class="fa-solid fa-calendar-days hidden md:inline"></i>
                                <div class="badge badge-outline">{{ $post->created_at }}
                                </div>
                                <div class="badge badge-outline">{{ $post->user->name }}
                                </div>
                            </div>
                            <div>
                                <i class="fa-solid fa-book-open hidden md:inline"></i>
                                <div class="badge badge-outline">{{ $post->category->name }}
                                </div>
                            </div>
                        </div>
                    </x-card.card-default>
                    <x-card.card-default class="static mt-5">
                        {!! $post->body !!}

                    </x-card.card-default>
                    @if ($post->user->description)
                        <x-card.card-default class="static mt-5" title="Tentang Penulis">
                            <div class="flex w-full flex-col">
                                <div class="flex justify-center">
                                    <div class="avatar">
                                        <div
                                            class="ring-base-200 ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                                            @if ($post->user->photo)
                                                <img
                                                    src="{{ asset('storage/photo/' . $post->user->name . '/' . $post->user->photo) }}" />
                                            @else
                                                <img src="{{ asset('assets/images/male.png') }}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div>
                                    <p class="text-justify">{{ $post->user->description }}</p>
                                </div>
                            </div>
                        </x-card.card-default>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
