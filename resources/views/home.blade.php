@section('title', 'Beranda')

<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative isolate hero rounded-lg p-4">
                <svg viewBox="0 0 1108 632" aria-hidden="true"
                    class="absolute top-10 -z-10 max-w-none transform-gpu blur-3xl lg:top-[calc(50%-30rem)]">
                    <path fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)" fill-opacity=".2"
                        d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z">
                    </path>
                    <defs>
                        <linearGradient id="175c433f-44f6-4d59-93f0-c5c51ad5566d" x1="1220.59" x2="-85.053"
                            y1="432.766" y2="638.714" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4F46E5"></stop>
                            <stop offset="1" stop-color="#80CAFF"></stop>
                        </linearGradient>
                    </defs>
                </svg>

                <div class="hero-content flex-col lg:flex-row-reverse">
                    <img src="{{ asset('assets/images/illustration.png') }}" class="max-w-sm rounded-lg" />
                    <div>
                        <h1 class="text-5xl font-extrabold">Kumpulan Artikel Teknologi, Digital & Coding</h1>
                        <p class="py-6">
                            Temukan artikel teknologi yang kamu inginkan sekarang.
                        </p>
                        <button class="btn btn-primary"><i class="fa-solid fa-rocket"></i> Get Started</button>
                    </div>
                </div>
            </div>



            <div class="py-12">
                <h2 class="font-bold text-center md:text-3xl text-lg">Artikel Terbaru</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-6 p-4">
                    @forelse ($posts as $post)
                        <x-card.card-image title="{{ $post->title }}"
                            image="{{ $post->image ? 'storage/post/' . $post->image : 'assets/images/no-image.png' }}"
                            class="static">
                            <p>{{ $post->excerpt }}</p>
                            <p class="font-bold"><span class="badge badge-primary">{{ $post->created_at }}</span></p>
                            <div class="card-actions md:justify-end justify-start items-center">
                                <div class="badge badge-outline">{{ $post->user->name }}</div>
                            </div>
                            <a href="{{ url('/' . $post->slug) }}" class="mt-3">
                                <x-button.primary-button type="submit"
                                    class="btn-md text-base-100 w-full">Lihat</x-button.primary-button>
                            </a>
                        </x-card.card-image>
                    @empty
                        <x-card.card-default class="static md:col-span-2 lg:col-span-4 col-span-1">
                            <div class="flex flex-col w-full border-opacity-50">
                                <div class="grid h-20 card bg-base-300 rounded-box place-items-center">Data Tidak
                                    Ditemukan
                                </div>
                            </div>
                        </x-card.card-default>
                    @endforelse
                </div>
                <div class="mt-3 flex justify-center">
                    <a href="{{ url('/blog') }}">
                        <x-button.primary-button class="ms-3" type="button">
                            {{ __('Lihat Semua') }}
                        </x-button.primary-button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
