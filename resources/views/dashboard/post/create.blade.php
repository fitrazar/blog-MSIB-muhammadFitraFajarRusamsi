@section('title', 'Tambah Postingan / Artikel')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card.card-default class="static">
                <a href="{{ route('dashboard.post.index') }}">
                    <x-button.info-button>
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </x-button.info-button>
                </a>

                <x-form action="{{ route('dashboard.post.store') }}" class="md:grid md:grid-cols-2 gap-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mt-4">
                        <img class="imgPreview h-auto max-w-lg mx-auto hidden" alt="image">
                        <x-input.input-label for="image" :value="__('Cover')" />
                        <x-input.input-file id="image" class="mt-1 w-full" type="file" name="image"
                            :value="old('image')" required autofocus autocomplete="image" onchange="previewImage()" />
                        <x-input.input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input.input-label for="title" :value="__('Judul')" />
                        <x-input.text-input id="title" class="mt-1 w-full" type="text" name="title"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input.input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input.input-label for="category_id" :value="__('Kategori')" />
                        <x-input.select-input id="category_id" class="select2 mt-1 w-full" name="category_id" required
                            autofocus autocomplete="category_id">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? ' selected' : ' ' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-input.select-input>
                        <x-input.input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    {{-- Hidden Input --}}
                    <x-input.text-input id="slug" class="mt-1 w-full" type="hidden" name="slug"
                        :value="old('slug')" required autofocus autocomplete="slug" />


                    <div class="mt-4 col-span-2">
                        <x-input.input-label for="summernote" :value="__('Isi')" />
                        <x-input.text-area id="summernote" class="mt-1 w-full" type="text" name="body"
                            :value="old('body')" required autofocus autocomplete="body" />
                        <x-input.input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    
                    <div class="mt-4 col-span-2">
                        <x-input.input-label for="status" class="label cursor-pointer mr-6">
                            <x-input.checkbox name="status" id="status" :title="__('Arsipkan?')" />
                        </x-input.input-label>
                        <x-input.input-error :messages="$errors->get('status')" class="mt-2" />
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

    <x-slot name="script">
        <script>
            const title = document.querySelector("#title");
            const slug = document.querySelector("#slug");

            title.addEventListener("keyup", function() {
                let preslug = title.value;
                preslug = preslug.replace(/[^a-zA-Z0-9\s]/g, "");
                preslug = preslug.replace(/ /g, "-");
                slug.value = preslug.toLowerCase();
            });

            function previewImage() {
                const image = document.querySelector('#image')
                const imgPreview = document.querySelector('.imgPreview')

                imgPreview.style.display = 'block'

                const oFReader = new FileReader()
                oFReader.readAsDataURL(image.files[0])
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result
                }
            }
        </script>
    </x-slot>
</x-app-layout>
