<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::with(['category', 'user'])->latest();

        if (auth()->user()->role !== 'administrator') {
            $query->where('user_id', auth()->id());
        }

        $post = $query->paginate(5);

        return view('backend.post.list-post.index', compact('post'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.post.list-post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'nullable|image|max:2048',
                'is_slider' => 'boolean',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts', 'public');
            }

            $data = $request->only(['title', 'content', 'category_id']);
            $data['is_slider'] = $request->has('is_slider') ? 1 : 0;
            $data['user_id'] = auth()->id();
            $data['views'] = 0;
            $data['image'] = $imagePath;
            $data['slug'] = Str::slug($request->title);

            $originalSlug = $data['slug'];
            $counter = 1;
            while (Post::where('slug', $data['slug'])->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter++;
            }

            Post::create($data);

            // Log aktivitas
            $this->logActivity('Menambahkan post baru: ' . $data['title']);

            return redirect()->route('post.index')->with('success', 'Post berhasil ditambah.');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', 'Terjadi kesalahan saat tambah post.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('backend.post.list-post.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'nullable|image|max:2048',
                'is_slider' => 'boolean',
            ]);

            $oldContent = $post->content;
            preg_match_all('/<img[^>]+src="([^">]+)"/', $oldContent, $oldImages);
            $oldImages = $oldImages[1];

            $data = $request->only(['title', 'content', 'category_id']);
            $data['is_slider'] = $request->has('is_slider') ? 1 : 0;
            $data['user_id'] = auth()->id();

            if ($request->hasFile('image')) {
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }
                $data['image'] = $request->file('image')->store('posts', 'public');
            }

            if ($post->title !== $request->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;
                while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter++;
                }
                $data['slug'] = $slug;
            }

            $post->update($data);

            preg_match_all('/<img[^>]+src="([^">]+)"/', $post->content, $newImages);
            $newImages = $newImages[1];

            foreach ($oldImages as $img) {
                $parsedUrl = parse_url($img, PHP_URL_PATH);
                $relativePath = ltrim(str_replace('/storage/', '', $parsedUrl), '/');

                if (!in_array($img, $newImages) && Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }

            $this->logActivity('Memperbarui post: ' . $post->title);

            return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', 'Terjadi kesalahan saat memperbarui post.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $content = $post->content;
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $content, $matches);

            if (!empty($matches[1])) {
                foreach ($matches[1] as $imgUrl) {
                    $parsedUrl = parse_url($imgUrl, PHP_URL_PATH);
                    $storagePath = ltrim(str_replace('/storage/', '', $parsedUrl), '/');

                    if (Storage::disk('public')->exists($storagePath)) {
                        Storage::disk('public')->delete($storagePath);
                    }
                }
            }

            $title = $post->title;
            $post->delete();

            // Log aktivitas
            $this->logActivity('Menghapus post: ' . $title);

            return redirect()->route('post.index')->with('success', 'Post berhasil dihapus beserta semua gambar kontennya.');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', 'Terjadi kesalahan saat menghapus post.');
        }
    }



    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('ckeditor', $filename, 'public');

            $url = asset('storage/' . $path);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false, 'error' => ['message' => 'Upload gagal']]);
    }
}
