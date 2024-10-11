<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $posts = Post::where('user_id', $user->id)->latest()->get();

            return DataTables::of($posts)->make();
        }

        return view('dashboard.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'categories' => Category::where('status', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|string|unique:posts,slug',
            'image' => 'nullable|image|max:4096',
            'body' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $validatedData['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('post', $validatedData['image']);
        }
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 70);
        $validatedData['status'] = $request->status == true ? 0 : 1;

        Post::create($validatedData);

        return redirect('/dashboard/post')->with('success', 'Post Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->user->id != Auth::user()->id) {
            abort(403);
        }

        return view('dashboard.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user->id != Auth::user()->id) {
            abort(403);
        }

        return view('dashboard.post.edit', [
            'categories' => Category::where('status', 1)->get(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'image' => 'nullable|image|max:4096',
            'body' => 'required',
        ];


        $validatedData = $request->validate($rules);

        $validatedData['image'] = $request->oldImage;
        if ($request->file('image')) {
            $path = 'post';
            if ($request->oldImage) {
                Storage::delete($path . '/' . $request->oldImage);
            }
            $validatedData['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($path, $validatedData['image']);
        }


        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 70);
        $validatedData['status'] = $request->status == true ? 0 : 1;
        Post::findOrFail($post->id)->update($validatedData);

        return redirect('/dashboard/post')->with('success', 'Post Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('post/' . $post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/post')->with('success', 'Post Berhasil Dihapus!');
    }
}
