@section('title', $post->title)
@section('description', $post->meta_description)
@section('image', asset('storage/post/' . $post->image))

<x-guest-layout>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="breadcrumbs text-sm p-2">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('post.index') }}">Artikel</a></li>
                    <li>{{ $post->title }}</li>
                </ul>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                <div class="mt-3 col-span-2 p-2">
                    <h1 class="font-bold md:text-xl text-lg">{{ $post->title }}</h1>
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

                <div>
                    <x-card.card-default class="static mt-5" title="Artikel Lain">
                        <div class="flex w-full flex-col">
                            @foreach ($posts as $post)
                                <a href="{{ url('/' . $post->slug) }}" class="flex justify-start items-center">
                                    <div class="avatar mr-4">
                                        <div class="w-16 rounded">
                                            <img class="object-cover" src="{{ asset('storage/post/' . $post->image) }}"
                                                alt="{{ $post->slug }}">
                                        </div>
                                    </div>

                                    {{ $post->title }}
                                </a>
                                <div class="divider"></div>
                            @endforeach
                        </div>
                        <a href="{{ url('/blog') }}" class="mt-3">
                            <x-button.primary-button type="button" class="btn-md text-base-100 w-full">Lihat
                                Semua</x-button.primary-button>
                        </a>
                    </x-card.card-default>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
