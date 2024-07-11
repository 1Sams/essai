<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFileterRequest;
use App\Http\Requests\CreatPostRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Str;

class Blogcontroller extends Controller
{

    public function create(){
        return view('blog.create');
    }

    public function store( CreatPostRequest $request ){
        $post= Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' =>$post->slug, 'post'=> $post->id])->with('success',"l'article à bien été créé");

    }

    public function edit(Post $post) {
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, CreatPostRequest $request) {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' =>$post->slug, 'post'=> $post->id])->with('success',"l'article à bien été modifié");

    }


    public function index(BlogFileterRequest $request) {

        return view('blog.index',[
        ]);
    }


    public function show(string $slug, Post $post): RedirectResponse | view
    {

        $posts = Post::findOrFail($post);
        if ($posts->slug != $slug) {
            return to_route('blog.show', ['slug' =>$posts->slug, 'id' => $posts->id]);
        }

     return view('blog.show',
     );
    }
}
