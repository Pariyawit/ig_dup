<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index',compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(Request $request)
    {
    	$data = request()->validate([
    		'caption' => 'required',
    		'image' => ['required','image']
    	]);

        // $imagePath = request('image')->store('uploads', 'public');
        // $imagePath = request('image')->store('uploads');
        // dd($imagePath);

    	$image = Image::make(request('image'))->fit(1200,1200)->encode('jpg');
        $hash = substr(md5(microtime()),rand(0,26),40);
        $imagePath = "public/uploads/{$hash}.jpg";

        Storage::put($imagePath,$image->stream());

        // dd($imagePath);

    	auth()->user()->posts()->create([
    		'caption' => $data['caption'],
    		'image' => $imagePath,
    	]);

    	return redirect('/profile/'.auth()->user()->id);

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
