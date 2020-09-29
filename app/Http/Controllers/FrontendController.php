<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('index')->with('setting', Setting::first())
                            ->with('tags', Tag::all())
                            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                            ->with('thrash', Category::find(3))
                            ->with('heavy', Category::find(1))
                            ->with('death', Category::find(4));
    }

    //Single post page
    public function single($slug) {
        try{
            $post = Post::where('slug', $slug)->first();
            $categories = Category::take(5)->get();

            $next_id = Post::where('id', '>', $post->id)->min('id');
            $prev_id = Post::where('id', '<', $post->id)->max('id');
        
            return view('single', compact('post', 'categories'))
                                ->with('setting', Setting::first())
                                ->with('tags', Tag::all())
                                ->with('next', Post::find($next_id))
                                ->with('prev', Post::find($prev_id));
        }catch(\Exception $e) {
            $e = "Not Found";
            return view('404', compact('e'));
        }
        
    }

    public function category($name) {
        $category = Category::where('name', $name)->get();

        return view('category')->with('category', $category)
                               ->with('title', $category->first()->name)
                               ->with('setting', Setting::first())
                               ->with('categories', Category::take(5)->get())
                               ->with('tags', Tag::all());
    }

    public function tag($tag) {
        $tag = Tag::where('tag', $tag)
                  ->get();

        return view('tag')->with('tag', $tag)
                          ->with('title', $tag->first()->tag)
                          ->with('setting', Setting::first())
                          ->with('categories', Category::take(5)->get())
                          ->with('tags', Tag::all());
    }

    public function results() {
        $posts = Post::where('title', 'like', '%'.request('query').'%')->get();
        
        return view('results')->with('posts', $posts)
                              ->with('title', 'Search results: ' . request('query'))
                              ->with('setting', Setting::first())
                              ->with('categories', Category::take(5)->get())
                              ->with('query', request('query'))
                              ->with('tags', Tag::all());
    }
}
