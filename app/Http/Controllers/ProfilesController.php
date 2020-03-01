<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
	public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.'. $user->id,
            now()->addSeconds(30),
            function() use ($user){
            return $user->posts->count();
        });
        $followerCount = Cache::remember(
            'count.follower.'. $user->id,
            now()->addSeconds(30),
            function() use ($user){
                return $user->profile->follower->count();
            }
        );
        $followingCount = Cache::remember(
            'count.following.'. $user->id,
            now()->addSeconds(30),
            function() use ($user){
                return $user->following->count();
            }
        );

        return view('profiles.index', compact('user','follows','postCount','followerCount','followingCount'));
    }

    public function edit(User $user)
    {
    	$this->authorize('update', $user->profile);
    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
    	$this->authorize('update', $user->profile);
    	$data = request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'url' => 'url',
    		'image' => ['image'],
    	]);

    	if (request('image')){
    		// $imagePath = request('image')->store('profile', 'public');
	    	// $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
	    	// $image->save();

            $image = Image::make(request('image'))->fit(1000,1000)->encode('jpg');
            $hash = substr(md5(microtime()),rand(0,26),40);
            $imagePath = "public/profile/{$hash}.jpg";
            Storage::put($imagePath,$image->stream());

            // dd(Storage::url($imagePath));

            $imageArray = ['image' => $imagePath];
    	}

    	auth()->user()->profile()->update(array_merge(
    		$data,
    		$imageArray ?? []
    	));

    	return redirect("/profile/{$user->id}");

    }
}
