<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostController extends Controller
{
    // ...

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'author' => 'required',
            'content' => 'required|min:20',
            'image' => 'required|image|mimes:png,jpg,webp|max:2048',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = uploadImage($request->file('image'));

        $post = Post::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'date' => $request->input('date'),
        ]);

        // Redirect or return a response
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts,title,' . $id . '|max:255',
            'author' => 'required',
            'content' => 'required|min:20',
            'image' => 'nullable|image|mimes:png,jpg,webp|max:2048',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = uploadImage($request->file('image'));
            $post->image = $imagePath;
        }

        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->date = $request->input('date');
        $post->save();

        // Redirect or return a response
    }

}
