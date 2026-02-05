<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsPostController extends Controller
{
    public function index()
    {
        $posts = NewsPost::latest()->paginate(10);
        return view('user.news-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.news-posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_name' => ['required', 'string', 'max:255'],
            'comments_count' => ['nullable', 'integer', 'min:0'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['comments_count'] = $data['comments_count'] ?? 0;
        $data['is_published'] = $request->boolean('is_published');
        $data['slug'] = Str::slug($data['title']);

        // Ensure unique slug
        $baseSlug = $data['slug'];
        $i = 1;
        while (NewsPost::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $baseSlug.'-'.$i++;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        NewsPost::create($data);

        return redirect()->route('user.news-posts.index')->with('success', 'News post created.');
    }

    public function edit(NewsPost $news_post)
    {
        return view('user.news-posts.edit', ['post' => $news_post]);
    }

    public function update(Request $request, NewsPost $news_post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_name' => ['required', 'string', 'max:255'],
            'comments_count' => ['nullable', 'integer', 'min:0'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['comments_count'] = $data['comments_count'] ?? 0;
        $data['is_published'] = $request->boolean('is_published');

        // Update slug if title changed
        $newSlug = Str::slug($data['title']);
        if ($newSlug !== $news_post->slug) {
            $baseSlug = $newSlug;
            $i = 1;
            while (NewsPost::where('slug', $newSlug)->where('id', '!=', $news_post->id)->exists()) {
                $newSlug = $baseSlug.'-'.$i++;
            }
            $data['slug'] = $newSlug;
        }

        if ($request->hasFile('image')) {
            if ($news_post->image && Storage::disk('public')->exists($news_post->image)) {
                Storage::disk('public')->delete($news_post->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news_post->update($data);

        return redirect()->route('user.news-posts.index')->with('success', 'News post updated.');
    }

    public function destroy(NewsPost $news_post)
    {
        if ($news_post->image && Storage::disk('public')->exists($news_post->image)) {
            Storage::disk('public')->delete($news_post->image);
        }

        $news_post->delete();

        return redirect()->route('user.news-posts.index')->with('success', 'News post deleted.');
    }
}
