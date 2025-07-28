<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">{{ $post->title }}</h3>
                    <p class="text-gray-700 mb-6">{{ $post->content }}</p>

                    {{-- Detail Atribut Baru --}}
                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>URL Konten:</strong>
                            @if($post->url_content)
                                <a href="{{ $post->url_content }}" target="_blank" class="text-blue-600 hover:underline">{{ $post->url_content }}</a>
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Gambar Thumbnail:</strong>
                            @if($post->thumbnail_image)
                                {{-- Gunakan asset() untuk gambar yang disimpan lokal --}}
                                <img src="{{ asset($post->thumbnail_image) }}" alt="Thumbnail" class="mt-2 max-w-xs h-auto rounded-md shadow-sm">
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Platform Sosial Media:</strong> {{ $post->social_media_platform ? ucfirst($post->social_media_platform) : '-' }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Tanggal Upload:</strong> {{ $post->upload_date ? \Carbon\Carbon::parse($post->upload_date)->format('d F Y') : '-' }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Tanggal Dibuat:</strong> {{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d F Y H:i:s') : '-' }}</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-sm text-gray-600"><strong>Tanggal Diedit:</strong> {{ $post->updated_at ? \Carbon\Carbon::parse($post->updated_at)->format('d F Y H:i:s') : '-' }}</p>
                    </div>
                    {{-- End Detail Atribut Baru --}}

                    <div class="flex items-center">
                        <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                            Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus post ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('posts.index') }}" class="ml-auto text-indigo-600 hover:text-indigo-900">Kembali ke Daftar Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>