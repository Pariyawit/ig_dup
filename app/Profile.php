<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
	protected $guarded = [];

	public function profileImage()
	{
		$imagePath = ($this->image) ? Storage::url($this->image) : asset('image/no-profile-image.png');

		return $imagePath;
	}

	public function follower(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
