<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Post Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Tambahkan enctype untuk upload file --}}
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Konten</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Deskripsi Konten</label>
                            <textarea name="content" id="content" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Atribut Baru --}}
                        <div class="mb-4">
                            <label for="url_content" class="block text-sm font-medium text-gray-700">URL Konten</label>
                            <input type="url" name="url_content" id="url_content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('url_content') }}">
                            @error('url_content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="thumbnail_image" class="block text-sm font-medium text-gray-700">Gambar Thumbnail Konten</label>
                            {{-- Ubah type menjadi file --}}
                            <input type="file" name="thumbnail_image" id="thumbnail_image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            @error('thumbnail_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="social_media_platform" class="block text-sm font-medium text-gray-700">Platform Sosial Media</label>
                            <select name="social_media_platform" id="social_media_platform" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Pilih Platform</option>
                                <option value="youtube" {{ old('social_media_platform') == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                <option value="tiktok" {{ old('social_media_platform') == 'tiktok' ? 'selected' : '' }}>TikTok</option>
                                <option value="instagram" {{ old('social_media_platform') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                <option value="facebook" {{ old('social_media_platform') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="x" {{ old('social_media_platform') == 'x' ? 'selected' : '' }}>X</option>
                                <option value="thread" {{ old('social_media_platform') == 'thread' ? 'selected' : '' }}>Thread</option>
                                <option value="berita" {{ old('social_media_platform') == 'berita' ? 'selected' : '' }}>Berita</option>
                            </select>
                            @error('social_media_platform')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jenis_social_media" class="block text-sm font-medium text-gray-700">Jenis Sosial Media</label>
                            <select name="jenis_social_media" id="jenis_social_media" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Pilih Jenis</option>
                                <option value="infografis" {{ old('jenis_social_media') == 'infografis' ? 'selected' : '' }}>Infografis</option>
                                <option value="videografis" {{ old('jenis_social_media') == 'videografis' ? 'selected' : '' }}>Videografis</option>
                            </select>
                            @error('jenis_social_media')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="upload_date" class="block text-sm font-medium text-gray-700">Tanggal Upload</label>
                            <input type="date" name="upload_date" id="upload_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('upload_date') }}">
                            @error('upload_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End Atribut Baru --}}

                        <div class="flex items-center justify-end">
                            <a href="{{ route('posts.index') }}" class="mr-4 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Simpan Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>