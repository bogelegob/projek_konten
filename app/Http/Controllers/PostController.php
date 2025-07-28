<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url_content' => 'nullable|url|max:255',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
            'social_media_platform' => 'nullable|in:youtube,tiktok,instagram,facebook,x,thread,berita',
            'jenis_social_media' => 'nullable|in:infografis,videografis',
            'upload_date' => 'nullable|date',
        ]);

        $data = $request->all();

        // Handle file upload for thumbnail_image
        if ($request->hasFile('thumbnail_image')) {
            $imagePath = $request->file('thumbnail_image')->store('public/thumbnails');
            // Simpan hanya nama file atau path relatif dari folder public
            $data['thumbnail_image'] = Storage::url($imagePath); // Akan menghasilkan /storage/thumbnails/namafile.ext
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url_content' => 'nullable|url|max:255',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
            'social_media_platform' => 'nullable|in:youtube,tiktok,instagram,facebook,x,thread,berita',
            'jenis_social_media' => 'nullable|in:infografis,videografis',
            'upload_date' => 'nullable|date',
        ]);

        $data = $request->all();

        // Handle file upload for thumbnail_image
        if ($request->hasFile('thumbnail_image')) {
            // Hapus gambar lama jika ada
            if ($post->thumbnail_image) {
                // Pastikan path yang dihapus sesuai dengan yang disimpan
                $oldImagePath = str_replace('/storage/', 'public/', $post->thumbnail_image);
                Storage::delete($oldImagePath);
            }

            $imagePath = $request->file('thumbnail_image')->store('public/thumbnails');
            $data['thumbnail_image'] = Storage::url($imagePath);
        } else {
            // Jika tidak ada file baru diupload, pertahankan gambar lama
            // Atau jika checkbox 'hapus gambar' diaktifkan, set null
            // Untuk sementara, kita pertahankan jika tidak ada upload baru
            unset($data['thumbnail_image']); // Jangan update kolom ini jika tidak ada file baru
        }


        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus gambar terkait saat post dihapus
        if ($post->thumbnail_image) {
            $imagePath = str_replace('/storage/', 'public/', $post->thumbnail_image);
            Storage::delete($imagePath);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}